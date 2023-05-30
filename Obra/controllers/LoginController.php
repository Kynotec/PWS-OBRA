<?php

require_once 'models/Auth.php';
require_once 'controllers/Controller.php';

class LoginController extends Controller
{
    public function index()
    {
        $this->renderView('login','index',[],'login');
    }

    public function checkLogin()

    {
        $auth = new Auth();
        $username = $this->getHTTPPostParam('username');
        $password = $this->getHTTPPostParam('password');


        if ($auth ->checkAuth($username,$password))
        {
            echo 'Login com sucesso';
            echo $auth->getUsername(),$auth->getUserRole();
        }
        else{
            echo 'login invalido';
           // $this->redirectToRoute('login','index');
        }

    }
}