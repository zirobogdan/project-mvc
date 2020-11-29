<?php

use Core\Libs\Route;

spl_autoload_register(function($className){
    require_once $className.'.php';
});

Route::start();
