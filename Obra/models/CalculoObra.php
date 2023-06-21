<?php

class CalculoObra
{

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