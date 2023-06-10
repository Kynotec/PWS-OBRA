<?php

class LinhaObraController extends Controller
{

    public function index($idFolhaObra){
        $folhaobra = FolhaObra::find($idFolhaObra);
        $this->renderview('folhaobra', 'index', ['folhaobra' => $folhaobra]);

    }

    public function create($idFolhaObra,$idServico)
    {
        $folhaobra = FolhaObra::find($idFolhaObra);
        $empresa = Empresa::find(1);
        $cliente = User::find([$folhaobra->cliente_id]);
        $linhaObras = LinhaObra::all();


    }
    public function store()
    {
        $linhaobra = new LinhaObra();

        /*

        $linhaobra->quantidade = ;
        $linhaobra->valorunitario =;
        $linhaobra->valor = valorunitario x quantidade;
        $linhaobra->valoriva = $linhaobra->valor x taxa de iva ;
        $linhaobra->subtotal = $linhaobra->valor + $linhaobra->valoriva;

        //Atualizar forms da FolhaObra
        $linhaobra->folhaobra->atualizarForms();

        */

    }

    public function selectServico()
    {


    }



}