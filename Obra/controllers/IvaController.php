<?php

class IvaController extends Controller
{
    public function index(){
        //$this->loginFilterByRole(['administrador', 'funcionario']);
        $ivas = Iva::all();
        $this-> renderView('iva','index',['ivas' => $ivas]);
    }
}