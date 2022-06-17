<?php

class Empresa extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('designacaosocial','message' => 'O campo Designação Social não pode estar vazio!'),
        array('morada', 'message' => 'O campo Morada não pode estar vazio!'),
        array('nif', 'message' => 'O nif não pode estar vazio!'),
        array('telefone', 'message' => 'O telefone não pode estar vazio!'),
        array('codigopostal', 'message' => 'O campo Código Postal  não pode estar vazio!'),
        array('localidade', 'message' => 'O campo Localidade não pode estar vazio!'),
        array('capitalsocial', 'message' => 'O campo Capital Social não pode estar vazio!')
    );

    static $validates_numericality_of = array(
        array('telefone', 'only_integer' => true , 'message' => 'Introduza apenas numeros!'),
        array('nif', 'only_integer' => true, 'message' => 'Introduza apenas numeros!')
    );

    static $validates_uniqueness_of = array(
        array('email', 'message' => 'Este email já existe!'),
        array('telefone', 'message' => 'Este telefone já existe!'),
        array('nif', 'message' => 'Este nif já existe!')
    );

    static $validates_size_of = array(
        array('telefone', 'is' => 9, 'wrong_length' => 'O número de telefone deve conter 9 digitos!'),
        array('nif', 'is' => 9, 'wrong_length' => 'O Nif deve conter 9 digitos!')
    );


    static $validates_format_of = array(
        array('email', 'with' => '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', 'message' => 'E-mail inválido')
    );


}