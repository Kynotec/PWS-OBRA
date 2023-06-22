<?php

class Auth
{

    public function __construct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE)
            session_start();
    }

    function checkAuth($username, $password)
    {
        $user = User::find_by_username_and_password($username, $password);

        if (!is_null($user))
        {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user->role;
            $_SESSION['ativo'] = $user->ativo;
            $_SESSION['id'] = $user->id;
            return true;

        }
        else
        {
            return false;
        }
    }

    function isLoggedIn()
    {
        return isset($_SESSION['username']);
    }

    function logout()
    {
        if (isset($_SESSION))
            session_destroy();
    }

    public function getUsername()
    {
        if($this->isLoggedIn())
            return $_SESSION['username'];
        else
            return null;
    }


    public function getUserId()
    {
        if($this->isLoggedIn())
        {
            return $_SESSION['id'];
        }
        else
        {
            return null;
        }
    }

    public function getUserRole()
    {
        if($this->isLoggedIn())
        {
            return $_SESSION['role'];
        }
        else
        {
            return null;
        }
    }

    public function isLoggedInAs($roles=[]): bool
    {
       if($this->isLoggedIn())
       {
               $role = $this->getUserRole();
               return in_array($role,$roles); //verificar se o role ta dentro do array
       }
      return false;

    }

}