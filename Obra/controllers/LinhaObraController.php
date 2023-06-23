<?php

class LinhaObraController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }

    public function index($idFolhaObra){
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();

        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);

        $this->renderview('linhaobra', 'index', ['folhaobra' => $folhaobra, 'empresa'=>$empresa]);



    }

    public function create($idServico,$idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();

        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);


        if(!is_null($idServico)) {

            $servico = Servico::find($idServico);
            $this->renderView('linhaobra','create',['folhaobra'=>$folhaobra, 'empresa'=>$empresa,'servico'=>$servico,'idServico'=>$idServico]);
        }else{
            $idServico=null;
            $this->renderView('linhaobra','create',['folhaobra'=>$folhaobra, 'empresa'=>$empresa,'idServico'=>$idServico]);
        }

    }

    public function store($idFolhaObra,$idServico)
    {

        $folhaobra = FolhaObra::find($idFolhaObra);
        $quantidade = $this->getHTTPPostParam('quantidade');

        $linhaobra = new  LinhaObra($this->getHTTPPost());
        $linhaobra->folha_obra_id = $idFolhaObra;
        $linhaobra->servico_id = $idServico;

        $linhaobra->quantidade=$quantidade;
       $linhaobra->valoriva= $linhaobra->servico->precohora*($linhaobra->servico->iva->percentagem/100);



        if ($linhaobra->is_valid()) {
            $linhaobra->save();
            $this->redirectToRoute('linhaobra', 'index', ['idFolhaObra' => $idFolhaObra]);
        } else {
            $this->renderView('linhaobra', 'index', ['idFolhaObra' => $idFolhaObra]);
        }
    }

    public function delete($idLinhaObra, $idFolhaObra)
    {
        $linhaobra = LinhaObra::find($idLinhaObra);
        $linhaobra->delete();
        $this->redirectToRoute('linhaobra', 'index', ['idFolhaObra' => $idFolhaObra]);
    }

    public function edit($idLinhaObra, $idFolhaObra, $idServico)
    {
        $linhaobra = LinhaObra::find($idLinhaObra);
        $empresa = Empresa::first();
        $folhaobra = FolhaObra::find($idFolhaObra);
        $servico = Servico::find($idServico);
        $cliente = User::find($folhaobra->cliente_id);
        if (is_null($linhaobra)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('linhaobra', 'edit', ['servico' => $servico ,'folhaobra' => $folhaobra, 'empresa' => $empresa, 'cliente' => $cliente, 'idServico' => $idServico, 'linhaobra' => $linhaobra, 'idLinhaObra' => $idLinhaObra]);
        }
    }

    public function update($idLinhaObra, $idFolhaObra)
    {
        $linhaobra = LinhaObra::find($idLinhaObra);
        $linhaobra->update_attributes($this->getHTTPPost());
        if($linhaobra->is_valid()){
            $linhaobra->save();

            $this->redirectToRoute('linhaobra', 'index', ['idFolhaObra' => $idFolhaObra]);
        } else {
            $this->renderView('linhaobra', 'index', ['idFolhaObra' => $idFolhaObra]);
        }
    }
    public function selectServico($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $servicos = Servico::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        $viewSearch = "./index.php?c=linhaobra&a=selectServico" .
            "&&idFolhaObra=".$idFolhaObra;

        if (isset($filterType, $tableSearch) && $tableSearch != '') {
            $servicos = array_filter($servicos, function ($servico) use ($filterType, $tableSearch) {
                if (!strcmp($filterType, 'descricao') ||
                    !strcmp($filterType, 'precohora'))
                {
                    return str_contains(strtoupper($servico->{$filterType}), strtoupper($tableSearch));
                }

                else if (!strcmp($filterType, 'iva')) {
                    return str_contains(strtoupper($servico->{$filterType}->percentagem), strtoupper($tableSearch));
                }
                else if (!strcmp($filterType, 'id')) {
                    return str_contains(strtoupper($servico->{$filterType}), strtoupper($tableSearch));
                }
                return false;
            });
        }
        $this->renderView('linhaobra', 'selectServico', ['servicos' => $servicos,'folhaobra'=>$folhaobra,'viewSearch'=>$viewSearch]);


    }



}