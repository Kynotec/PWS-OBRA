<?php

class FolhaObraController extends Controller
{

    public function index()//$estado, $idCliente)
    {
        $folhaobra = FolhaObra::all();
        $this->renderView('folhaobra','index', ['folhaobra' => $folhaobra]);

        /*
        if(!is_null($idCliente))
        {
            $this->renderView('fatura', 'index', ['folhaobra' => $folhaobra, 'estado' => $estado, 'idCliente' => $idCliente]);
        }else{
            $idCliente = null;
            $this->renderView('fatura', 'index', ['folhaobra' => $folhaobra, 'estado' => $estado, 'idCliente' => $idCliente]);
        }
        */
    }

    public function selectCliente()
    {

    }

    public function store($idCliente){
        $folhaobra = new FolhaObra();

        $folhaobra->data = date_default_timezone_set('Lisbon') ; // Data do Sistema
        $folhaobra->valortotal = 0;
        $folhaobra->ivatotal = 0;
        $folhaobra->estado = 'Em Lançamento';
        $folhaobra->cliente_id =$idCliente;
        $auth = new Auth();
        $folhaobra->funcionario_id =$auth->getUserId();

    }


}