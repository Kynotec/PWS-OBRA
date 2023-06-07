<?php

class LinhaObraController extends Controller
{

    public function index(){
        $folhaobras = FolhaObra::all();
        $this->renderview('fatura', 'index', ['folhaobras' => $folhaobras]);

    }

    public function create($idFolhaObra)
    {
        $folhaobra = FolhaObra::find([$idFolhaObra]);
        $empresa = Empresa::find([1]);
        $cliente = User::find([$folhaobra->cliente_id]);
        $linhaObras = LinhaObra::all();


    }

    public function selectServico()
    {

    }

    public function store()
    {

    }

}