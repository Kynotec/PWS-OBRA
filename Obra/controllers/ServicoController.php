<?php

class ServicoController extends Controller
{

    public function index()
    {
        $servicos = Servico::all();
        $this->RenderView('servico', 'index', ['servicos' => $servicos]);
    }


    public function create()
    {
        $servicos = Servico::all();
        $this->renderView('servico', 'create',  ['servicos' => $servicos]);
    }

    public function store()
    {
        $servicos = new Servico($this->getHTTPPost());

        if($servicos->is_valid()){
            $servicos->save();
            $this-> redirectToRoute('servico', 'index');
        } else {
            $servicos = Servico::all();
            $this->renderView('servico', 'create',  ['servicos' => $servicos]);
        }
    }

    public function edit($id)
    {
        $servicos = Servico::find($id);
        if (is_null($servicos)) {
            //TODO redirect to standard error page
        } else {
            $ivas = Iva::all();
            $this->renderView('servico', 'edit', ['id' => $id,'servicos' => $servicos, 'ivas' => $ivas]);
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