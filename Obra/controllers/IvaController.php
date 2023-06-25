<?php

class IvaController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }

    public function index()
    {

        $ivas = Iva::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if (isset($filterType, $tableSearch) && $tableSearch != '') {
            $ivas = array_filter($ivas, function ($iva) use ($filterType, $tableSearch) {
                if (!strcmp($filterType, 'descricao') ||
                    !strcmp($filterType, 'percentagem'))
                {
                    return str_contains(strtoupper($iva->{$filterType}), strtoupper($tableSearch));
                }

                return false;
            });
    }
        $this->renderView('iva', 'index', ['ivas' => $ivas]);
    }


    public function show($id)
    {
        try {

            $ivas = Iva::find($id);
            if (is_null($ivas)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->renderView('iva', 'show', ['ivas' => $ivas]);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'iva/index']);
        }
    }

    public function create()
    {
        $this->renderView('iva', 'create', ['iva' => new Iva()]);
    }

    public function store()
    {
        if ($this->getHTTPPostParam('emvigor')) {
            $this->setHTTPOSTParam('emvigor', 1);
        } else {
            $this->setHTTPOSTParam('emvigor', 0);
        }

        $ivas = new Iva($this->getHTTPPost());
        if ($ivas->is_valid()) {
            $ivas->save();
            $this->redirectToRoute('iva', 'index');

        } else {
            $this->renderView('iva', 'create', ['ivas' => $ivas]);
        }
    }

    public function edit($id)
    {
        try {

            $iva = Iva::find($id);
            if (is_null($iva)) {
                //TODO redirect to standard error page
            } else {
                $this->renderView('iva', 'edit', ['iva' => $iva]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'iva/index']);
        }
    }

    public function update($id)
    {
        try {


            $iva = Iva::find($id);

            if ($this->getHTTPPostParam('emvigor')) {
                $this->setHTTPOSTParam('emvigor', 1);
            } else {
                $this->setHTTPOSTParam('emvigor', 0);
            }

            $iva->update_attributes($this->getHTTPPost());
            if ($iva->is_valid()) {
                $iva->save();
                $this->redirectToRoute('iva', 'index');
            } else {
                $this->renderView('iva', 'edit', ['iva' => $iva]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'iva/index']);
        }
    }


    public function disable($id)
    {
        try {


            $iva = Iva::find($id);
            $iva->update_attribute('emvigor', 0);
            $iva->save();
            $this->RedirectToRoute('iva', 'index');//redirecionar para o index
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'iva/index']);
        }
    }

    public function enable($id)
    {
        try {


            $iva = Iva::find($id);
            $iva->update_attribute('emvigor', 1);
            $iva->save();
            $this->RedirectToRoute('iva', 'index');//redirecionar para o index
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'iva/index']);
        }
    }


}