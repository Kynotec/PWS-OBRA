<?php

class FuncionarioController extends Controller
{
    public function index(){
        $users = User::all();
        $this->renderView('funcionario', 'index', ['users' => $users]);
    }

    public function create()
    {
        $this->renderView('funcionario','create');
    }

    public function store()
    {
        $users = new User($this->getHTTPPost());
        if($users->is_valid()){
            $users->save();
            $this->redirectToRoute('funcionario','index');
        } else {
            $this->renderView('funcionario', 'create', ['users' => $users]);
        }
    }

    public function edit($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            //TODO redirect to standard error page
        } else {
            $this->renderView('funcionario', 'edit', ['users' => $users]);
        }
    }
    public function update($id)
    {
        $users = User::find($id);
        $users->update_attributes($this->getHTTPPost());
        if($users->is_valid()){
            $users->save();
            $this-> redirectToRoute('funcionario', 'index');
        } else {
            $this->renderView('funcionario', 'edit', ['users' => $users]);
        }
    }
}