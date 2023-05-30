<?php

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $this->renderView('user', 'index', ['users' => $users]);
    }


    public function create()
    {

        $this->renderView('user', 'create');
    }
    public function store()
    {
        $users = new User($_POST);
        if($users->is_valid()){
            $users->save();
            $this->redirectToRoute('user','index');
        } else {
            $this->renderView('user', 'create', ['users' => $users]);
        }
    }

    public function edit($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            //TODO redirect to standard error page
        } else {
            $roles = Role::all();
            $this->renderView('user', 'edit', ['users' => $users, 'roles' => $roles]);
        }
    }
    public function update($id)
    {
        $users = User::find($id);
        $users->update_attributes($_POST);
        if($users->is_valid()){
            $users->save();
            $this-> redirectToRoute('user', 'index');
        } else {
            $roles = Roles::all();
            $this->renderView('user', 'edit', ['users' => $users, 'roles' => $roles]);
        }
    }

    public function show($id)
    {
        $user = User::find([$id]);
        if (is_null($user)) {
            //TODO redirect to standard error page
        } else {
            $this->makeView('user', 'show', ['user' => $user]);
        }
    }
}