<?php

class Servico extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia'),
        array('descricao'),
        array('precohora'),
        array('taxaiva')
    );
    static $belongs_to = array(
        array('iva')
    );
    static $has_many = array(
        array('linhaobra')
    );

}