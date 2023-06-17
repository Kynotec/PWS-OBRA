<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('percentagem', 'message' => 'É necessário indicar o valor da taxa'),
        array('emvigor', 'message' => 'É necessário indicar se está ativo ou não'),
        array('descricao', 'message' => 'É necessário indicar a descrição da taxa'),
    );

    static $has_many = array(
        array('servico')
    );
}