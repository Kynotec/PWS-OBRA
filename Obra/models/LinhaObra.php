<?php

class LinhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('folhaobra_id', 'message' => 'Indique a fatura a que pertence'),
        array('servico_id', 'message' => 'Selecione um serviço'),
        array('valorunitario', 'message' => 'Indique o valor da obra '),
        array('quantidade', 'message' => 'Indique a quantidade do produto'),
        array('iva_id', 'message' => 'Selecione uma taxa de iva')
    );

    static $validates_numericality_of = array(
        array('valorunitario'),
        array('quantidade')
    );

    static $belongs_to = array(
        array('folhaobra'),
        array('servico'),
        array('iva')
    );

}