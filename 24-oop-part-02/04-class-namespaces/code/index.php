<?php

// Namespaces
use Admin\User;
use Client\User as Client;

require __DIR__ . "/src/Admin/Role.php";
require __DIR__ . "/src/Admin/User.php";
require __DIR__ . "/src/Client/User.php";


// Prints the fully qualified name of the Class "User" w/in the Namespace "Admin"
var_dump("Admin\\User");
echo "<br />";
echo "<br />";

// Using ::class to return the fully qualified name of a Class including Namespace as a string
var_dump(User::class);
echo "<br />";
var_dump(Client::class);
echo "<br />";
echo "<br />";

// Print the fully qualified name of the Class that the object in $admin belongs to (as a string)
$admin = new User();
var_dump($admin::class);
echo "<br />";
echo "<br />";

// Print the fully qualified name of the Class that the object in $client belongs to (as a string)
$client = new Client();
var_dump($client::class);
echo "<br />";
echo "<br />";

// Check if the object in $client is an instance of the Class "Client" (a Namespace alias)
var_dump($client instanceof Client);
echo "<br />";

// Check if the object in $client is an instance of the Class "\Client\User" (fully qualified name)
var_dump($client instanceof \Client\User);
echo "<br />";

// Check if the object in $client is an instance of the Class "User" w/in the Namespace "Admin" (see Namespace declaration)
var_dump($client instanceof User);
echo "<br />";
