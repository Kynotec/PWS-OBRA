<?php

class DefinicoesController extends Controller
{
    public function index()
    {
        $this->authenticationFilter();
        $auth = new Auth();

        if($auth->getUserRole() == 'cliente') {
            $this->RenderView('definicoes', 'index',[],'Bocliente');
        }
        else
        $this->renderView('definicoes', 'index',[],'default');

    }

    public function  updateEmail()
    {
        $this->authenticationFilter();

        $userEmail = $_SESSION['email'];
        $user = User::find_by_Email($userEmail); // Assuming you have a method to find the user by email


        $user->update_attribute('email', $this->getHTTPPostParam('new_email')); // Update the email attribute with the new email value from $_POST['new_email']

        if ($user->is_valid()) {
            $user->save();
            $_SESSION['email'] = $user->email;
            $this->RedirectToRoute('definicoes', 'index');}
        else
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'definicoes/index']);
        }

    }

    public function updatePassword()
    {
        $this->authenticationFilter();

        try {
            $auth = new Auth();
            $userName = $_SESSION['username'];
            $user = User::find_by_username($userName);


            if ($auth->checkAuth($userName, $this->getHTTPPostParam('old_password'))) {

                if ($this->getHTTPPostParam('new_password') == $this->getHTTPPostParam('re_new_password')) {
                    $user->update_attribute('password', ($this->getHTTPPostParam('new_password')));


                    if ($user->is_valid()) {
                        $user->save();
                        $this->RedirectToRoute('definicoes', 'index');
                    } else {
                        $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'definicoes/index']);
                    }
                }
                else
                {
                    $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'definicoes/index']);
                }
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'definicoes/index']);
            }
        }
        catch(Exception $_)
        {
            $this->RedirectToRoute('errors', 'index', ['callbackRoute' => 'definicoes/index']);
        }
    }



}