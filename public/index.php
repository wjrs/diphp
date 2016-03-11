<?php

require_once '../config/di.php';

/** @var \App\User $user */
$user = $container['user'];


echo $user->colunas;