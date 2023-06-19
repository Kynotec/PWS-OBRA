<?php

require_once 'models/Auth.php';
require_once 'controllers/Controller.php';

class BoClienteController extends Controller
{

    public function index()
    {
        $this->renderView('bocliente','index',[],'Bocliente');
    }


}