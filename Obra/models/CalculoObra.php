<?php

class CalculoObra extends Controller
{
    public function atualizarLinhaObra($linhaobra){
        $linhaobra->valoriva = $linhaobra->servico->precohora*$linhaobra->quantidade*($linhaobra->servico->iva->percentagem/100);
        $linhaobra->valortotal = $linhaobra->servico->precohora*$linhaobra->quantidade + ($linhaobra->valorunitario * $linhaobra->quantidade * ($linhaobra->servico->iva->percentagem/100));
    }
    public function AtualizarForm($folhaobra)
    {
        $CalculoObra = New CalculoObra();
        $subtotal = $CalculoObra->calcularSubTotal($folhaobra);
        $iva = $CalculoObra->calcularIvaTotal($folhaobra);

        $total = $subtotal + $iva;
        $folhaobra->valortotal = $total;
        $folhaobra->ivatotal = $iva;
        $folhaobra->subtotal = $subtotal;
    }
    public function calcularIvaTotal($folhaobra)
    {
        $iva = 0;
        foreach ($folhaobra->linhaobras as $linhaobra)
        {
            $iva += $linhaobra->valoriva;
        }
        return $iva;
    }

    public function calcularSubTotal($folhaobra)
    {
        $subtotal = 0;
        foreach ($folhaobra->linhaobras as $linhaobra)
        {
            $subtotal += $linhaobra->valorunitario * $linhaobra->quantidade;
        }
        return $subtotal;
    }
}