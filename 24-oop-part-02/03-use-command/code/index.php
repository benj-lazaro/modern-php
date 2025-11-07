<?php

// The "use" operator creates the alias "Admin" for the Class "User" w/in the Namespace "Admin"
use Admin\User as Admin;

// The "use" operator creates the alias "Client" for the Class "User" w/in the Namespace "Client"
use Client\User as Client;

require __DIR__ . "/src/Admin/Role.php";
require __DIR__ . "/src/Admin/User.php";
require __DIR__ . "/src/Client/User.php";

// Instantiate an Object from Class "User" within the Namespace "Admin"
$admin = new Admin();
var_dump($admin);

// Instantiate an Object from Class "User" within the Namespace "Client"
$client = new Client();
var_dump($client);
