<?php

class LinhaObraController extends Controller
{

    public function index($idFolhaObra){
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::find(1);
        $this->renderview('linhaobra', 'index', ['folhaobra' => $folhaobra, 'empresa'=>$empresa]);

    }

    public function create($idServico,$idFolhaObra)
    {


        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::find(1);
        $CalculoObra = new CalculoObra();
        $subtotal = $CalculoObra->calcularSubTotal($folhaobra);
        if(!is_null($idServico)) {

            $servico = Servico::find($idServico);
            $this->renderView('linhaobra','create',['folhaobra'=>$folhaobra,'subtotal'=>$subtotal, 'empresa'=>$empresa,'servico'=>$servico,'idServico'=>$idServico]);
        }else{
            $idServico=null;
            $this->renderView('linhaobra','create',['folhaobra'=>$folhaobra, 'empresa'=>$empresa,'$idServico'=>$idServico]);
        }

    }
    public function store()
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $quantidade = $this->getHTTPPostParam('quantidade');
        // $CalculoObra = new CalculoObra(); //Modelo de Calculo
        /*
        $verificar = $CalculoObra->verificarProduto($fatura, $idProduto, $qtd);
        if($verificar != null)
        {
            if($verificar->is_valid()) {
                $verificar->update_attribute('quantidade', $verificar->quantidade);
                $verificar->save();
                $this->redirectToRoute('linhaFatura', 'create', ['id' => $idFatura]);
                return;
            }
        }


        $linhaFatura = new  LinhaFatura($_POST);
        $linhaFatura->fatura_id = $idFatura;
        $linhaFatura->produto_id = $idProduto;

        if ($linhaFatura->is_valid()) {
            $linhaFatura->save();
            $this->redirectToRoute('linhaFatura', 'create', ['id' => $idFatura]);
        } else {
            $this->renderView('linhaFatura', 'create', ['id' => $idFatura]);
        }
    }



        /*

        $linhaobra->quantidade = ;
        $linhaobra->valorunitario =;
        $linhaobra->valor = valorunitario x quantidade;

        $linhaobra->valoriva = $linhaobra->valor x taxa de iva ;
        $linhaobra->subtotal = $linhaobra->valor + $linhaobra->valoriva;

        //Atualizar forms da FolhaObra
        $linhaobra->folhaobra->atualizarForms();

        */

    }

    public function selectServico($idFolhaObra)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $servicos = Servico::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if ($filterType && $tableSearch !== '') {
            $servicos = array_filter($servicos, function($servico) use ($filterType, $tableSearch) {
                return str_contains(strtoupper($servico->{$filterType}), strtoupper($tableSearch));
            });
        }
        $this->renderView('linhaobra', 'selectServico', ['servicos' => $servicos,'folhaobra'=>$folhaobra]);


    }



}