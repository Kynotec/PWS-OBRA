<?php
require_once 'Controller.php';

class HomeController extends Controller
{
    public function index(){

        $this->renderView('layout','default');

    }

}