<?php

class BoClienteController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario','cliente']);
    }

    public function index()
    {
        $this->renderView('bocliente','index',[],'Bocliente');
    }


}