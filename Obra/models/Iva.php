<?php

class Iva extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'),
        array('percentagem'), array('descricao'), array('emvigor')
    );
}