<?php
require_once './vendor/autoload.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('./model');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/faturapws',
        )
    );
});

define('NOME_APP', 'Fatura Mais');
