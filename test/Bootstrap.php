<?php

$autoload = __DIR__ . '/../vendor/autoload.php';

if(!file_exists($autoload)) {
    throw new RuntimeException('Autoloader cannot be located. Did you install with composer?');
}

$loader = require $autoload;

$loader->add('NetglueCreateSend\\', __DIR__);
