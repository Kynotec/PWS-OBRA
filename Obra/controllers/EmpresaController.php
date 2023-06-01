<?php

class EmpresaController extends Controller
{
    public function index(){
        //$this->loginFilterByRole(['administrador', 'funcionario']);
        $empresa = Empresa::find(1);
        $this->renderView('empresa', 'index', ['empresa' => $empresa]);
    }

    public function edit($id)
    {
        //$this->loginFilterByRole(['administrador', 'funcionario']);
        $empresa = Empresa::find($id);
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
        }
    }
    public function update($id)
    {
        //$this->loginFilterByRole(['administrador', 'funcionario']);
        $empresa = Empresa::find($id);
        $empresa->update_attributes($_POST);
        if($empresa->is_valid()){
            $empresa->save();
            $this-> redirectToRoute('empresa', 'index');
        } else {
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
        }
    }
}