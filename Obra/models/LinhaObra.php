<?php

class LinhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('folha_obra_id', 'message' => 'Indique a fatura a que pertence'),
        array('servico_id', 'message' => 'Selecione um serviço'),
        array('valorunitario', 'message' => 'Indique o valor da obra '),
        array('valoriva', 'message' => 'Indique o valor do iva '),
        array('quantidade', 'message' => 'Indique a quantidade do produto'),
        //array('subtotal'),
    );

    static $belongs_to = array(
        array('folhaobra'),
        array('servico'),
    );

}