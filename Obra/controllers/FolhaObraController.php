<?php
use Carbon\Carbon;
use Dompdf\Dompdf;

class FolhaObraController extends Controller
{
    public function index()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
        $folhaobras = FolhaObra::all();
        $folhaobras = $this ->filter($folhaobras);
        $this->renderView('folhaobra', 'index', ['folhaobras' => $folhaobras]);

    }

    public function indexcliente()
    {
        $this->AuthenticationFilterAs([ 'cliente']);
        $folhaobras = FolhaObra::all();
        $this->renderView('folhaobra','indexcliente',['folhaobras' => $folhaobras],'Bocliente');

    }

    public function create()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
            $empresas = Empresa::all();

            if (count($empresas) > 0) {
                $empresa = $empresas[0];
                $this->renderView('folhaobra', 'create', ['empresa' => $empresa]);
            }
            else $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);


    }

    public function show($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();
        $cliente = User::find([$folhaobra->cliente_id]);
        $CalculoObra = new CalculoObra();
        $subtotal = $CalculoObra->calcularSubTotal($folhaobra);

        if (is_null($folhaobra)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('folhaobra', 'show', [ 'folhaobra' => $folhaobra, 'empresa' => $empresa, 'cliente' => $cliente, 'subtotal' => $subtotal]);
        }
    }

    public function selectClient()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
        $users = User::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if ($filterType && $tableSearch !== '') {
            $users = array_filter($users, function ($user) use ($filterType, $tableSearch) {
                return str_contains(strtoupper($user->{$filterType}), strtoupper($tableSearch));
            });
        }
        $this->renderView('folhaobra', 'selectClient', ['users' => $users]);
    }

    public function store($idCliente)
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
        $folhaobra = new FolhaObra();
        $datetoday = Carbon::now();

        $folhaobra->data = $datetoday;
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
        $folhaobra->subtotal = 0;
        $folhaobra->estado = 'Em Lançamento';
        $folhaobra->cliente_id = $idCliente;
        $auth = new Auth();
        $folhaobra->funcionario_id = $auth->getUserId();

        if ($folhaobra->is_valid()) {
            $folhaobra->save();
            $this->redirectToRoute('linhaobra', 'index', ['idFolhaObra' => $folhaobra->id]);
        } else {
            $this->renderView('folhaobra', 'create', ['folhaobras' => $folhaobra]);
        }
    }

    public function delete($idFolhaObra)
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
        $folhaobra = FolhaObra::find($idFolhaObra);

        foreach ($folhaobra->linhaobras as $linhaobra) {
            $linhaobra->delete();
        }
        $folhaobra->delete();
        $this->redirectToRoute('folhaobra', 'create');
    }

    public function update($idFolhaObra)
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
        $folhaobra = FolhaObra::find($idFolhaObra);
        $CalculoObra = new CalculoObra();
        $empresa = Empresa::first();
        $cliente = User::find([$folhaobra->cliente_id]);
        $CalculoObra ->AtualizarForm($folhaobra);

        if($folhaobra->linhaobras == null)
        {
            $this->renderView('linhaobra', 'create', ['idFolhaObra' => $idFolhaObra, 'folhaobra' => $folhaobra, 'empresa' => $empresa, 'cliente' => $cliente, 'subtotal' => $subtotal]);

        }else {
            $folhaobra->update_attributes([]);
            $folhaobra->estado = 'Emitida';
            if($folhaobra->is_valid()){
                $folhaobra->save();

                $this-> redirectToRoute('folhaobra', 'show', ['idFolhaObra' => $idFolhaObra]);
            }
        }
    }
    private function filter($folhaobras)
    {
        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if (isset($filterType, $tableSearch) && $tableSearch != '') {
            $folhaobras = array_filter($folhaobras, function ($folhaobra) use ($filterType, $tableSearch) {
                if (!strcmp($filterType, 'cliente') || !strcmp($filterType, 'funcionario')) {
                    return str_contains(strtoupper($folhaobra->{$filterType}->username), strtoupper($tableSearch));
                } else if (!strcmp($filterType, 'estado')) {
                    return str_contains(strtoupper($folhaobra->{$filterType}->estado), strtoupper($tableSearch));
                } else if (!strcmp($filterType, 'total')) {
                    return str_contains(strtoupper($folhaobra->getTotal()), strtoupper($tableSearch));
                } else if (!strcmp($filterType, 'id')) {
                    return str_contains(strtoupper($folhaobra->{$filterType}), strtoupper($tableSearch));
                }
                return false;
            });
        }
        return $folhaobras;
    }



    public function pdf($idFolhaObra){
        $this->authenticationFilter();

        try
        {
            $auth = new Auth();
            $folhaobra = FolhaObra::find($idFolhaObra);

            if($auth->getUserRole() == 'cliente')
            {
                if(User::find_by_username($_SESSION['username'])->id != $folhaobra->cliente_id)
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);
                }
            }
            $empresa = Empresa::first();
            $dompdf = new Dompdf();
            // TODO Try to correct access external css
            $dompdf->setBasePath("./public/dist/css");

            //Load header
            $html = '<!DOCTYPE html>
            <html lang="pt">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link type="text/css" rel="stylesheet" media="dompdf" href="./public/dist/css/pdf.css">
                <title>Obra Nº' . $folhaobra->id . '</title>
            </head>';

            $html .=
                '<body>
            <style>'. file_get_contents('./public/dist/css/bootstrap.css').'</style>
            <section class="content" >
            <div class="container-fluid" >
        <div class="row" >
            <div class="col-12" >
                         <div class="invoice p-3 mb-3" style="background-color: #fffffc; color: #0a0e14">
                    <!-- title row -->
                    <div class="row" >
                        <div class="col-10">
                         <h2>
                                <b>Obra Nº ' . $folhaobra->id .'</b> <br>
                                 <span >Estado: <b>'.$folhaobra->estado .'</b></span><br>
                                <small class="float">Data: '.$folhaobra->data->format('Y-m-d H:i:s').' </small>
                            </h2>
                         </div>
                        </div>
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            <address> <br>
                         <table>
                            <tr>
                                <td class="col-sm-4 invoice-col">
                                <address> <br>
                                    '. $empresa->designacaosocial .'<br>
                                    <b>Localidade:</b><br>
                                    '. $empresa->morada .'<br>
                                    '. $empresa->codigopostal .', '. $empresa->localidade .'<br>
                                    <b>NIF:</b> '. $empresa->nif .'<br>
                                    <b>Telefone:</b> '. $empresa->telefone .'<br>
                                    <b>Email:</b> '. $empresa->email.'
                                    </address>
                                </td>
                                <td class="col-sm-4 invoice-col">
                                <address> <br>
                                    <b>Cliente:</b> <br>
                                    '. $folhaobra->cliente->username .' <br>
                                    <b>Morada:</b> <br>
                                    '. $folhaobra->cliente->morada .' <br>
                                    '. $folhaobra->cliente->codigopostal .', '. $folhaobra->cliente->localidade .' <br>
                                    <b>NIF:</b> '. $folhaobra->cliente->nif .'
                                    </address>
                                </td>
                            </tr>
                          </table>
                      </div>
                   </div>
                   
                    <div class="card mt-3">
                        <div class="row">
                            <div class="col-12 table">
                                <table class="table-left table-striped">
                                    <thead>
                                    <tr>
                                        <th>Referência</th>
                                        <th>Descrição</th>
                                        <th>QTD</th>
                                        <th>Valor Unitário</th>
                                        <th>Valor IVA</th>
                                        <th>Taxa IVA</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                ';
                foreach ($folhaobra->linhaobras as $linhaobra)
                {
                    $html .= '
                                   <tr>
                                   <td>'. $linhaobra->servico->id.'</td>
                                   <td>'. $linhaobra->servico->descricao.'</td>
                                   <td>'. $linhaobra->quantidade .'</td>
                                   <td>'. $linhaobra->valorunitario .'€</td>
                                   <td>'. $linhaobra->servico->iva->percentagem .'%</td>
                                   <td>'. $linhaobra->valorunitario * $linhaobra->quantidade.' €</td>
                                   </tr>
                                   </tbody></table>
                                    ';
             }
            $html .= '

                    </div> 
                   </div>
                   <br>
                   <div class="row flex-row-reverse">

                            <div class="col-md-2"">

                            <table class="tab-content">
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>
                                        ' . $folhaobra->subtotal . ' €
                                    </td>
                                </tr>
                                <tr>
                                    <th>IVA:</th>
                                    <td>' . $folhaobra->ivatotal . ' €
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>' . $folhaobra->valortotal . ' €
                                    </td>
                                </tr>
                            </table>
                        </div>
                     </div>
                    ';
            $html .= '
            <div class="col-sm-4 invoice-col">
            <p>Obra emitida por '. $folhaobra->funcionario->username .'</p>
           </div>
                    <br><br>
                </div>
            </div>
        </div>

    </div>

</section>
</div>
            ';
            //
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4');
            $dompdf->render();
            //Mostra uma página com a estrutura do PDF
            $dompdf->stream("pdf", array("Attachment" => false));
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);
        }

    }
}