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

    public function edit($id)
    {
        $servicos = Servico::all();
        if (is_null($servicos)) {
            //TODO redirect to standard error page
        } else {
            $ivas = Iva::all();
            $this->renderView('servico', 'edit', ['id' => $id, 'servicos' => $servicos, 'ivas' => $ivas]);
        }
    }
    public function update($id)
    {

        $servicos = Servico::find([$id]);
        $servicos->update_attributes($this->getHTTPPost());
        if($servicos->is_valid()){
            $servicos->save();
            $this-> redirectToRoute('servico', 'index');
        } else {
            $ivas = Iva::all();
            $this->renderView('servico', 'edit', ['servicos' => $servicos, 'ivas' => $ivas]);
        }
    }

}