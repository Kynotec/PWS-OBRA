<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'),
        array('designacaosocial'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigopostal'),
        array('localidade'),
        array('capitalsocial')
    );
}