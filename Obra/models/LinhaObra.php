<?php

class LinhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('folha_obra_id'),
        array('servico_id'),
        array('valorunitario'),
        array('valoriva'),
        array('quantidade', 'message' => 'Indique a quantidade do produto'),
        array('valortotal'),
    );

    static $validates_numericality_of = array(
        array('quantidade', 'only_integer' => true, 'message' => 'Tem que ser numerico')
    );
    static $belongs_to = array(
        array('folhaobra'),
        array('servico'),
    );

}