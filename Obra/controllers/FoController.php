<?php

class FoController extends Controller
{
    public function index()
    {
        $this->renderView('login','index');
    }

}