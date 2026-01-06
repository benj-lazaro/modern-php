<?php
// Simulates database connection using an external PHP file

header("Content-Type: text/plain");

// Save the returned PDO object from the external file
$returnValue = require "other-file.php";

// Work with the variable for database-related tasks
var_dump($returnValue);
