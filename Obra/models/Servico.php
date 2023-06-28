<?php

class Servico extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'É necessário indicar uma referência!'),
        array('descricao', 'message' => 'É necessário indicar uma descrição!'),
        array('precohora', 'message' => 'É necessário indicar o preço-hora!'),
        array('iva_id', 'message' => 'É necessário indicar uma taxa de IVA!'),

    );
    static $validates_numericality_of = array(
        array('referencia', 'only_integer' => true, 'message' => 'Tem que ser numérico!'),
    );
    static $belongs_to = array(
        array('iva')
    );
}