<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'É necessário indicar a Designação Social'),
        array('capitalsocial', 'message' => 'É necessário indicar o capital social'),
        array('email', 'message' => 'É necessário indicar um endereço de email'),
        array('morada', 'message' => 'É necessário indicar a morada'),
        array('localidade', 'message' => 'É necessário indicar a localidade')
    );

    static $validates_size_of = array(
        array('designacaosocial', 'maximum' => 100, 'message' => 'Excedeu o máximo de caracteres'),
        array('email', 'maximum' => 100, 'message' => 'Excedeu o máximo de caracteres'),
        array('telefone', 'is' => 9, 'message' => 'O campo do telefone deve conter 9 caracteres'),
        array('nif', 'is' => 9, 'message' => 'O campo do numero de contribuinte deve conter 9 caracteres'),
        array('morada', 'maximum' => 100, 'message' => 'Excedeu o máximo de caracteres'),
        array('codigopostal', 'is' => 8, 'message' => 'O campo do código de contribuinte deve conter o seguinte formato 0000-000'),
        array('localidade', 'maximum' => 40, 'message' => 'Excedeu o máximo de caracteres')
    );

    static $validates_pattern = array(
        array('codigopostal', FILTER_VALIDATE_REGEXP, array("regex" => "/^([1-9]{4})-([1-9]{3})$/"))
    );

    static $validates_format_of = array(
        array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'O email inserido é iválido')
    );
}