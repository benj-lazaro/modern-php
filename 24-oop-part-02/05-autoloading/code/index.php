<?php

// Function that loads the corresponding Class file as an argument value
// function autoload($class)
// {
//     // Require the Class "User" w/in the Namespace "Admin"
//     if ($class == "Admin\\User"):
//         require __DIR__ . "/src/Admin/User.php";
//         return;
//     endif;

//     // Require the Class "Role" w/in the Namespace "Admin"
//     if ($class == "Admin\\Role"):
//         require __DIR__ . "/src/Admin/Role.php";
//         return;
//     endif;

//     // Require the Class "User" w/in the Namespace "Client"
//     if ($class == "Client\\User"):
//         require __DIR__ . "/src/Client/User.php";
//         return;
//     endif;
// }

// Function that loads the corresponding Class file as an argument value
// function autoload($class)
// {
//     var_dump($class);

//     // Reconstruct the filepath of the Class file & its corresponding Namespace
//     $filepath = __DIR__ . "/src/" . str_replace("\\", "/", $class) . ".php";

//     // If Class file exists, automatically loads it and its corresponding Namespace
//     if (file_exists($filepath)) require $filepath;
// }

// Register the passed named function as an __autoload() implementation
// spl_autoload_register("autoload");

// Register the passed anonymous as an __autoload() implementation
spl_autoload_register(function ($class) {
    // Reconstruct the filepath of the Class file & its corresponding Namespace
    $filepath = __DIR__ . "/src/" . str_replace("\\", "/", $class) . ".php";

    // If Class file exists, automatically loads it and its corresponding Namespace
    if (file_exists($filepath)) require $filepath;
});

// Automatically require the corresponding Namespace & Class before instantiating an object
$admin = new Admin\User();
var_dump($admin);
echo "<br />";

$client = new Client\User();
var_dump($client);
echo "<br />";
