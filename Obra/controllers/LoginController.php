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

        $username = $this->getHTTPPostParam('username');
        $password = $this->getHTTPPostParam('password');

            $auth = new Auth();
            if($auth->checkAuth($username,$password))
            {
                if ($_SESSION['role'] == 'administrador') {
                    $this->redirectToRoute('bo','index');


                }
                if ($_SESSION['role'] == 'cliente') {
                    $this->redirectToRoute('bocliente','index');

                }
                if ($_SESSION['role'] == 'funcionario') {
                    $this->redirectToRoute('bo','index');

                }
            }
            else
            {
                $this->renderView('login', 'index',['fail'=>true],'login');
            }


    }

    public function logout()
    {
        $auth = new Auth();
        $this->authenticationFilter();
        $auth->logout();
        $this->redirectToRoute('login', 'index');
    }



}