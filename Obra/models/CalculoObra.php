<?php

class CalculoObra
{
    public function verificarServico($folhaobra, $idServico, $quantidade)
    {
        foreach ($folhaobra->linhaobras as $linhaobra) {
            if ($linhaobra->servico_id == $idServico) {
                $linhaobra->quantidade = $linhaobra->quantidade + $quantidade;
                return $linhaobra;
            }
        }
    }

    public function calcularIvaTotal($folhaobra)
    {
        $iva = 0;
        foreach ($folhaobra->linhaobras as $linhaobra)
        {
            $iva += $linhaobra->valoriva * $linhaobra->quantidade;
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