<?php

class EmpresaController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }

    public function index(){
        $empresa = Empresa::first();
        $this->renderView('empresa', 'index', ['empresa' => $empresa]);
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        if (is_null($empresa)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
        }
    }
    public function update($id)
    {
        try {

            $empresa = Empresa::find($id);
            $empresa->update_attributes($_POST);
            if ($empresa->is_valid()) {
                $empresa->save();
                $this->redirectToRoute('empresa', 'index');
            } else {
                $this->renderView('empresa', 'edit', ['empresa' => $empresa]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'empresa/index']);
        }
    }
}