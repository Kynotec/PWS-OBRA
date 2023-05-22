<?php

class User extends ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('username'),
        array('password'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigopostal'),
        array('localidade')
    );

    static $belongs_to = array(
        array('user')
    );


}
