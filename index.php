<?php

use Steampixel\Route;

require_once('config.php');
require_once('class/userclass.php');

Route::add('/', function() {
    echo "strona";
});

Route::add('/login', function() {
    echo "strona logowania";
});

Route::run('/loginform');
?>