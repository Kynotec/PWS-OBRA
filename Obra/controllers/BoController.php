<?php


class BoController extends Controller
{
    public  function  __construct()
    {
        $this->AuthenticationFilterAs([ 'administrador','funcionario']);
    }

    public function index()
    {
        $folhaobras = FolhaObra::all();
        $servicos = Servico::all();
        $users = User::all();
        $total = 0;
        $totalClientes = 0;
        $totalFuncionarios = 0;
        $totalServicos = 0;
        foreach ($folhaobras as $folhaObra)
        {
            if($folhaObra->estado == 'Emitida')
            {
                $total++;
            }
        }
        foreach ($servicos as $servico)
        {
            if($servico->ativo == '1')
            {
                $totalServicos++;
            }
        }


        foreach ($users as $cliente)
        {
            if($cliente->role == 'cliente')
            {
                $totalClientes++;
            }
        }
        foreach ($users as $funcionario)
        {
            if($funcionario->role == 'funcionario')
            {
                $totalFuncionarios++;
            }
        }
        $this->renderView('bo','index',['totalFuncionarios' => $totalFuncionarios,'totalClientes' => $totalClientes,'servicos'=>$servicos,'totalServicos'=>$totalServicos,'users' => $users,'folhaobras' => $folhaobras, 'total' => $total],'default');
    }

}