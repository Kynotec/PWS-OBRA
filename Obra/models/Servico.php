<?php

class Servico extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'É necessário indicar uma referência'),
        array('descricao', 'message' => 'É necessário indicar uma descriçção'),
        array('precohora', 'message' => 'É necessário indicar o preço-hora'),
        array('iva_id', 'message' => 'É necessário indicar uma taxa de IVA'),

    );
    static $belongs_to = array(
        array('iva')
    );
}