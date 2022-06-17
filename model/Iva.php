<?php

class Iva extends \ActiveRecord\Model
{


    static $validates_presence_of = array(
        array('descricao', 'message' => 'A descrição não pode estar vazia!'),
    );

    static $validates_numericality_of = array(
        array('percentagem', 'greater_than_or_equal_to' => 2.1 , 'message' => 'A taxa do iva tem de ser maior ou igual a 2.1%')
    );

    static $validates_inclusion_of = array(
        array('vigor', 'in' => array('sim', 'nao'))
    );

    static $has_many = array(
        array('produto')
    );
}