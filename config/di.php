<?php

require_once '../vendor/autoload.php';

$container = new Pimple\Container;

$container['conexao'] = function() {
    return new \App\Conexao;
};

$container['user'] = function($c) {
    return new \App\User($c['conexao']);
};