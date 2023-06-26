<?php

class LinhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('folha_obra_id'),
        array('servico_id'),
        array('valorunitario'),
        array('valoriva'),
        array('quantidade', 'message' => 'Indique a quantidade do produto!'),
        array('valortotal'),
    );


    static $belongs_to = array(
        array('folhaobra'),
        array('servico'),
    );

}