<?php

class FuncionarioController extends Controller
{

    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador']);
    }
    public function index(){

        $users = User::all();

        $filterType = $this->getHTTPPostParam('filter_type');
        $tableSearch = $this->getHTTPPostParam('table_search');

        if ($filterType && $tableSearch !== '') {
            $users = array_filter($users, function ($user) use ($filterType, $tableSearch) {
                return str_contains(strtoupper($user->{$filterType}), strtoupper($tableSearch));
            });
        }
        $this->renderView('funcionario', 'index', ['users' => $users]);
    }

    public function show($id)
    {
        try {

            $users = User::find($id);
            if (is_null($users)) {
                //TODO redirect to standard error page
            } else {
                //mostrar a vista show passando os dados por parâmetro
                $this->renderView('funcionario', 'show', ['users' => $users]);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function create()
    {
        $this->renderView('funcionario','create');
    }

    public function store()
    {
        try {

            $users = new User($this->getHTTPPost());
            if ($users->is_valid()) {
                $users->save();
                $this->redirectToRoute('funcionario', 'index');
            } else {
                $this->renderView('funcionario', 'create', ['users' => $users]);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function edit($id)
    {
        try {

            $users = User::find($id);
            if (is_null($users)) {
                //TODO redirect to standard error page
            } else {
                $this->renderView('funcionario', 'edit', ['users' => $users]);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }
    public function update($id)
    {
        try {

            if ($this->getHTTPPostParam('ativo')) {
                $this->setHTTPOSTParam('ativo', 1);
            } else {
                $this->setHTTPOSTParam('ativo', 0);
            }

            $users = User::find($id);
            $users->update_attributes($this->getHTTPPost());
            if ($users->is_valid()) {
                $users->save();
                $this->redirectToRoute('funcionario', 'index');
            } else {
                $this->renderView('funcionario', 'edit', ['users' => $users]);
            }
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

        public function disable($id)
    {
        try {

            $users = User::find($id);
            $users->update_attribute('ativo', 0);
            $users->save();
            $this->RedirectToRoute('funcionario', 'index');//redirecionar para o index
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

    public function enable($id)
    {
        try {

            $users = User::find($id);
            $users->update_attribute('ativo', 1);
            $users->save();
            $this->RedirectToRoute('funcionario', 'index');//redirecionar para o index
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'funcionario/index']);
        }
    }

}