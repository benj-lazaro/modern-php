<?php

header("Content-Type: text/plain");

// Date functions

// Returns an int representing a UNIX epoch
var_dump(time());

// Returns a float representing a UNIX epoch accurate to the nearest microsecond
$startTime = microtime(true);
var_dump(microtime(true));

$endTime = microtime(true);
var_dump($endTime - $startTime);

// Set the timezone
date_default_timezone_set("Asia/Manila");

// Get the current date
var_dump(date("Y-m-d H:i:s"));

var_dump(date("M/d/Y h:i a"));
