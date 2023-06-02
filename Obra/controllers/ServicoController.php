<?php

class ServicoController extends Controller
{
    public function index()
    {
        $servicos = Servico::all();
        $this->renderView('servico', 'index', ['servicos' => $servicos]);
    }

    public function create()
    {
        $ivas= Iva::all();
        $this->renderView('servico', 'create', ['ivas' => $ivas]);
    }

    public function store()
    {
        $servicos = new Iva($this->getHTTPPost());

        if($servicos->is_valid()){
            $servicos->save();
            $this-> redirectToRoute('servico', 'index');
        } else {
            $ivas= Iva::all();
            $this->renderView('servico', 'create',  ['servico' => $servicos, 'ivas' => $ivas]);
        }
    }

    public function edit($idProduto)
    {
        $produtos = Produto::all();
        if (is_null($produtos)) {
            //TODO redirect to standard error page
        } else {
            $ivas = Iva::all();
            $this->makeView('produto', 'edit', ['idProduto' => $idProduto, 'produtos' => $produtos, 'ivas' => $ivas]);
        }
    }
    public function update($id)
    {

        $produtos = Produto::find([$id]);
        $produtos->update_attributes($_POST);
        if($produtos->is_valid()){
            $produtos->save();
            $this-> redirectToRoute('produto', 'index');
        } else {
            $ivas = Iva::all();
            $this->makeView('produto', 'edit', ['produtos' => $produtos, 'ivas' => $ivas]);
        }
    }

}