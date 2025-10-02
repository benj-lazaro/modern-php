<?php

header("Content-Type: text/plain");

$message = "Happy 30th Birthday! 20 10";

// Initialize array that stores the matching strings returned by preg_match()
$findings = null;

// Search for the 1st instance of a 2 digit character from the input string
$result = preg_match('/\d\d/', $message, $findings);
var_dump($result);
var_dump($findings);
echo "\n";

// Search for the 1st instance of 2 non-digit characters
$result = preg_match('/\D\D/', $message, $findings);
var_dump($result);
var_dump($findings);
echo "\n";

// Search for the 1st instance of a word character
$result = preg_match('/\w/', $message, $findings);
var_dump($result);
var_dump($findings);
echo "\n";

// Search for ALL instances of a 2-digit number from the input string
// $result = preg_match_all('/\d\d/', $message, $findings);
// var_dump($result);
// var_dump($findings);

// Search for 2-digit characters followed by a word character
$result = preg_match('/\d\d\w\w/', $message, $findings);
var_dump($result);
var_dump($findings);
echo "\n";

// Search for 2-digit characters followed by the string 'th'
$result = preg_match('/\d\dth/', $message, $findings);
var_dump($result);
var_dump($findings);
echo "\n";
