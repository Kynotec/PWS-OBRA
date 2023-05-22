<?php

class Auth
{

    public function __construct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE)
            session_start();
    }

    function checkLogin($username, $password)
    {
        if($username == "admin" && $password == "admin")
        {
            $_SESSION['nome'] = $username;
            return true;
        }
        else
        {
            return false;
        }
    }

    function isLoggedIn()
    {
        return isset($_SESSION['nome']);
    }

    function logout()
    {
        session_destroy();
    }
}