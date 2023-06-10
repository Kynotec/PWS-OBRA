<?php

class FolhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('estado', 'message' => 'Indique o estado da fatura'),
        array('cliente_id', 'message' => 'Selecione o um cliente para a fatura'),
        array('funcionario_id', 'message' => 'Selecione um funcionario para a fatura')
    );

    static $belongs_to = array(
        array('cliente', 'class_name' => 'User', 'foreign_key' => 'cliente_id'),
        array('funcionario', 'class_name' => 'User', 'foreign_key' => 'funcionario_id'),
        array('user')
    );


   static $has_many = array(
        array('linhaobras')
    );


    /*   AtualizarForms()
     *
     *  Percorrer todas linhas obras:
     *
     *  $valorTotal
     *  $ivaTotal
     *  $Total
     *
     *  Atualizar os valores ao modelo e save
     *
     *
     */



}