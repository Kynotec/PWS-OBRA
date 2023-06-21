<?php
use Carbon\Carbon;

class FolhaObraController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }
    public function index()
    {
        $folhaobras = FolhaObra::all();

        $folhaobras = $this ->filter($folhaobras);
        $this->renderView('folhaobra', 'index', ['folhaobras' => $folhaobras]);

    }

    public function create()
    {
            $empresas = Empresa::all();

            if (count($empresas) > 0) {
                $empresa = $empresas[0];
                $this->renderView('folhaobra', 'create', ['empresa' => $empresa]);
            }
            else $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);


    }

    public function selectClient()
    {
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
        $folhaobra = new FolhaObra();
        $datetoday = Carbon::now();

        $folhaobra->data = $datetoday;
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
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
        $folhaobra = FolhaObra::find($idFolhaObra);

        foreach ($folhaobra->linhaobras as $linhaobra) {
            $linhaobra->delete();
        }
        $folhaobra->delete();
        $this->redirectToRoute('folhaobra', 'create');
    }


    public function update($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $CalculoObra = new CalculoObra();
        $empresa = Empresa::first();
        $cliente = User::find([$folhaobra->cliente_id]);
        $subtotal = $CalculoObra->calcularSubTotal($folhaobra);
        $iva = $CalculoObra->calcularIvaTotal($folhaobra);
        $total = $subtotal + $iva;


        $folhaobra->valortotal = $total;
        $folhaobra->ivatotal = $iva;
        $error = '1';



        if($folhaobra->linhaobras == null)
        {

            $this->renderView('linhaobra', 'create', [ 'error' => $error,'idFolhaObra' => $idFolhaObra, 'folhaobra' => $folhaobra, 'empresa' => $empresa, 'cliente' => $cliente, 'subtotal' => $subtotal]);

        }else {
            $folhaobra->update_attributes([]);
            if($folhaobra->is_valid()){
                $folhaobra->save();
                $folhaobra->estado = 'Emitida';
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
}