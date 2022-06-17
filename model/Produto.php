<?php

class Produto extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia', 'message' => 'A referência não pode estar vazia!'),
        array('descricao', 'message' => 'A descrição não pode estar vazia!'),

    );

    static $validates_numericality_of = array(
        array('preco', 'greater_than' => 0.01,'message' => 'O preço do produto têm de ser maior que 0€!'),
        array('stock', 'greater_than_or_equal_to' => 0, 'message' => 'O stock do produto tem de ser maior ou igual a "0"!'),
        array('iva_id', 'only_integer' => true)

    );

    static $belongs_to = array(
        array('iva')
    );

    static $has_many = array(
        array('linhafatura')
    );

}
