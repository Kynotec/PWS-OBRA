<?php

class FuncionarioController extends Controller
{
    public function index(){
        $users = User::all();
        $this->renderView('funcionario', 'index', ['users' => $users]);
    }

    public function show($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            //TODO redirect to standard error page
        } else {
            //mostrar a vista show passando os dados por parâmetro
            $this->renderView('funcionario','show',['users'=>$users]);
        }
    }

    public function create()
    {
        $this->renderView('funcionario','create');
    }

    public function store()
    {
        if($_POST['ativo']){
            $_POST['ativo'] = 1;
        }else{
            $_POST['ativo'] = 0;
        }

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

        if(isset($_POST['ativo'])){
            $_POST['ativo'] = 1;
        }else{
            $_POST['ativo'] = 0;
        }

        $users = User::find($id);
        $users->update_attributes($this->getHTTPPost());
        if($users->is_valid()){
            $users->save();
            $this-> redirectToRoute('funcionario', 'index');
        } else {
            $this->renderView('funcionario', 'edit', ['users' => $users]);
        }
    }

    public function disable($id)
    {
        $users = User::find($id);
        $users->update_attribute('ativo', 0);
        $users->save();
        $this->RedirectToRoute('funcionario', 'index');//redirecionar para o index
    }

    public function enable($id)
    {
        $users = User::find($id);
        $users->update_attribute('ativo', 1);
        $users->save();
        $this->RedirectToRoute('funcionario', 'index');//redirecionar para o index
    }

}