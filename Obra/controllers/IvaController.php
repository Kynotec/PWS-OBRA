<?php

class IvaController extends Controller
{
    public function index(){
        //$this->loginFilterByRole(['administrador', 'funcionario']);
        $ivas = Iva::all();
        $this-> renderView('iva','index',['ivas' => $ivas]);
    }

    public function create()
    {
        $this->renderView('iva','create');
    }

    public function store()
    {
        $iva = new Iva($this->getHTTPPost());
        if($iva->is_valid()){
            $iva->save();
            $this->redirectToRoute('iva','index');

        } else {
            $this->renderView('iva','create', ['iva' => $iva]);
        }
    }

    public function edit($id)
    {
        $iva = Iva::find($id);
        if (is_null($iva)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }
    public function update($id)
    {
        $iva = Iva::find($id);
        $iva->update_attributes($this->getHTTPPost());
        if($iva->is_valid()){
            $iva->save();
            $this-> redirectToRoute('iva', 'index');
        } else {
            $this->renderView('iva', 'edit', ['iva' => $iva]);
        }
    }



}