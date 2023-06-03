<?php

class Servico extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia'),
        array('descricao'),
        array('precohora'),
        array('iva_id', 'message' => 'É necessário indicar uma taxa de IVA'),

    );
    static $belongs_to = array(
        array('iva')
    );
}