<?php

class DefinicoesController extends Controller
{
    public function index()
    {
        $this->authenticationFilter(); //
        $this->RenderView('definicoes', 'index');
    }

    public function  updateEmail()
    {
        $this->authenticationFilter();

        $user = $_SESSION['email'];
        $user->update_attribute('email', $_POST['new_email']);

        if($user->is_valid())
        {
            $user->save();
            $_SESSION['email'] = $user->email;
            $this->RedirectToRoute('definicoes', 'index');

        }

    }




}