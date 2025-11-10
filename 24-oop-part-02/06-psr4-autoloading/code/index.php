<?php

// Autoloads Classes w/in Namespaces using PSR-4 Autoload
require __DIR__ . "/autoload.php";

// Own Namespaces, NOT Namespaces from a 3rd-party code
$admin = new App\Admin\User();
$client = new App\Client\User();

var_dump($admin);
