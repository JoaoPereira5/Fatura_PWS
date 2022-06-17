<?php

class Linhafatura extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade'),
        array('valorunitario'),
        array('valoriva'),
        array('produto_id'),
        array('fatura_id')

    );

    static $belongs_to = array(
        array('fatura'),
        array('produto')
    );
}