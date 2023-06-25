<?php

class ServicoController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }

    public function index()
    {
        $servicos = Servico::all();
        $servicos = $this->filter($servicos);
        $this->renderView('servico', 'index', ['servicos' => $servicos]);
    }

    public function filter($servicos)
    {
        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

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
        return $servicos;
    }

    public function show($id)
    {
        try {

            $servicos = Servico::find($id);
            if (is_null($servicos)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->renderView('servico', 'show', ['servico' => $servicos]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

    public function create()
    {
        $ivas= Iva::all();
        $this->renderView('servico', 'create', ['ivas' => $ivas]);
    }

    public function store()
    {
        try {

            $servicos = new Servico($this->getHTTPPost());

            if ($servicos->is_valid()) {
                $servicos->save();
                $this->redirectToRoute('servico', 'index');
            } else {
                $ivas = Iva::all();
                $this->renderView('servico', 'create', ['servicos' => $servicos, 'ivas' => $ivas]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

    public function edit($id)
    {
        try {

            $servico = Servico::find($id);
            if (is_null($servico)) {
                //TODO redirect to standard error page
            } else {
                $ivas = Iva::all();
                $this->renderView('servico', 'edit', ['id' => $id, 'servico' => $servico, 'ivas' => $ivas]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

    public function update($id)
    {
        try {

            $servicos = Servico::find($id);
            $servicos->update_attributes($this->getHTTPPost());
            if ($servicos->is_valid()) {
                $servicos->save();
                $this->redirectToRoute('servico', 'index');
            } else {
                $ivas = Iva::all();
                $this->renderView('servico', 'edit', ['servicos' => $servicos, 'ivas' => $ivas]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

    public function disable($id)
    {
        try {


            $servico = Servico::find($id);
            $servico->update_attribute('ativo', 0);
            $servico->save();
            $this->RedirectToRoute('servico', 'index');//redirecionar para o index
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

    public function enable($id)
    {
        try {


            $servico = Servico::find($id);
            $servico->update_attribute('ativo', 1);
            $servico->save();
            $this->RedirectToRoute('servico', 'index');//redirecionar para o index
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'servico/index']);
        }
    }

}