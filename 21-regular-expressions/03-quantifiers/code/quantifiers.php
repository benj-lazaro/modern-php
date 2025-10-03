<?php

header("Content-Type: text/plain");

$message = "Happy 30th Birthday!";

$matches = null;

// Look for a digit character repeated 0 up to any number of times
var_dump(preg_match('/\d*/', $message, $matches));
var_dump($matches);
echo "\n";

// Look for a digit character repeated at least once up to any number of times
var_dump(preg_match('/\d+/', $message, $matches));
var_dump($matches);
echo "\n";

// Look for a digit chracter repeated at least once up to any number of times
// Followed by an optional (space) character repeated 0 or 1 time and the characters 't' & 'h'
var_dump(preg_match('/\d+ ?th/', $message, $matches));
var_dump($matches);
echo "\n";

// Look for a word that consists of 5 repeated character class (whitespace ignored)
var_dump(preg_match('/\w{5}/', $message, $matches));
var_dump($matches);
echo "\n";

// Look for a word that consists of at least 5 repeated character class (whitespace ignored)
var_dump(preg_match_all('/\w{5,}/', $message, $matches));
var_dump($matches);
echo "\n";
