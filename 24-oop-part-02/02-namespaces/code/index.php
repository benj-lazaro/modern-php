<?php

require __DIR__ . "/src/Admin/User.php";
require __DIR__ . "/src/Client/User.php";

// Instantiating an Object from Class "User" within the Namespace "Admin"
$admin = new Admin\User();
var_dump($admin);

// Instantiating an Object from Class "User" within the Namespace "Client"
$client = new Client\User();
var_dump($client);
