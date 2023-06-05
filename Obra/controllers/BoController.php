<?php

require_once 'models/Auth.php';
require_once 'controllers/Controller.php';

class BoController extends Controller
{
    public function index()
    {
        $this->renderView('bo','index',[],'default');
    }

}