<?php

require_once 'models/Auth.php';
require_once 'controllers/Controller.php';

class BoController extends Controller
{
    public function index()
    {
        $this->renderView('login','index');
    }
    public function login()
    {
        $username = $this->getHTTPPostParam('name');
        $pass = $this->getHTTPPostParam('password');

        $auth = new Auth();

        if($auth->checkLogin($username, $pass))
        {
            $this->redirectToRoute('plano','index');
        }
        else
        {
            $erro = "Credenciais incorretas";
            $this->renderView('auth','index');
        }
    }

    public function logout()
    {
        $auth = new Auth();
        $auth->logout();
        $this->redirectToRoute('auth','index');

    }



}