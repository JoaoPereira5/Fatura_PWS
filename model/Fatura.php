<?php

class Fatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('data', 'message' => 'A data não pode estar vazia!'),
        array('estado', 'message' => 'O estado não pode estar vazio!')
    );
    static $validates_numericality_of = array(
        array('user_id', 'greater_than' => 0,'message' => 'O cliente não pode estar vazio!'),
        array('cliente_id', 'greater_than' => 0,'message' => 'O funcionário não pode estar vazio!')
    );

    static $belongs_to = array(
        array('user', 'foreign_key'=>'user_id', 'primary_key'=>'id', 'class_name' => 'User'),
        array('cliente', 'foreign_key'=>'cliente_id', 'primary_key'=>'id', 'class_name' => 'User')
    );

    static $has_many = array(
        array('linhafaturas')
    );

}