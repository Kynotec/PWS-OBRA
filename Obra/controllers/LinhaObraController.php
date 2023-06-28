<?php

class LinhaObraController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs(['administrador','funcionario']);
    }

/*
    public  function voltaratras($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();
        if($folhaobra->estado == 'Emitida'){
            $this->redirectToRoute('folhaobra', 'show', ['idFolhaObra' => $idFolhaObra]);
        }else{
            $this->renderview('linhaobra', 'index', ['folhaobra' => $folhaobra, 'empresa'=>$empresa]);
        }
    }
*/
    public function index($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();
        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);
       if($folhaobra->estado == 'Emitida'){
           $this->redirectToRoute('folhaobra', 'show', ['idFolhaObra' => $idFolhaObra]);
       }else{
           $this->renderview('linhaobra', 'index', ['folhaobra' => $folhaobra, 'empresa'=>$empresa]);
       }

    }

    public function create($idServico,$idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::first();

        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);
        try {
            $servico = Servico::find($idServico);
            if (!is_null($servico)) {
                $this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresa' => $empresa, 'servico' => $servico, 'idServico' => $idServico]);
            } else {
                $idServico = null;
                $this->renderView('linhaobra', 'create', ['folhaobra' => $folhaobra, 'empresa' => $empresa, 'idServico' => $idServico]);
            }
        }catch (Exception $_)
        {
            //TODO:: verificar erro
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);
        }

    }

    public function validate($idFolhaObra)
    {
        $referencia = $this->getHTTPPostParam('referencia');
        try {
        $servico = Servico::find($referencia);
        if (!is_null($servico)){
            $this->redirectToRoute('linhaobra', 'create', ['idServico' => $referencia,'idFolhaObra' => $idFolhaObra]);
        }
        }catch (Exception $_)
        {
            //TODO:: verificar erro
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'folhaobra/index']);
        }
    }

    public function store($idFolhaObra,$idServico)
    {
        $quantidade = $this->getHTTPPostParam('quantidade');

        $linhaobra = new  LinhaObra($this->getHTTPPost());
        $linhaobra->folha_obra_id = $idFolhaObra;
        $linhaobra->servico_id = $idServico;
        $linhaobra->quantidade =$quantidade;

        $CalculoObra = new CalculoObra();
        $CalculoObra ->atualizarLinhaObra($linhaobra);

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

        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);

        if (is_null($linhaobra)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('linhaobra', 'edit', ['servico' => $servico ,'folhaobra' => $folhaobra, 'empresa' => $empresa, 'cliente' => $cliente, 'idServico' => $idServico, 'linhaobra' => $linhaobra, 'idLinhaObra' => $idLinhaObra]);
        }
    }

    public function update($idLinhaObra, $idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $linhaobra = LinhaObra::find($idLinhaObra);
        $linhaobra->update_attributes($this->getHTTPPost());


        $CalculoObra = new CalculoObra();
        $CalculoObra ->AtualizarForm($folhaobra);
        $CalculoObra ->atualizarLinhaObra($linhaobra);

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