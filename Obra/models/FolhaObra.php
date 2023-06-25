<?php

class FolhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('estado'),
        array('cliente_id'),
        array('funcionario_id')
    );

    static $belongs_to = array(
        array('cliente', 'class_name' => 'User', 'foreign_key' => 'cliente_id'),
        array('funcionario', 'class_name' => 'User', 'foreign_key' => 'funcionario_id'),
     );


   static $has_many = array(
        array('linhaobras')
    );
}