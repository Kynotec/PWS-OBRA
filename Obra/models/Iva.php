<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'É necessário indicar o valor da taxa de IVA!'),
        array('emvigor'),
        array('descricao', 'message' => 'É necessário indicar a descrição da taxa de IVA!'),
    );

    static $has_many = array(
        array('servico')
    );
}