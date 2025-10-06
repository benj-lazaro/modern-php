<?php

header("Content-Type: text/plain");

$message = "Happy 30th Birthday!";

$matches = null;

// Get the word '30' from the input input string using Bracket expression
var_dump(preg_match('/[0-9][0-9]/', $message, $matches));
var_dump($matches);

// Select the word '30' using bracket expression & capture group
var_dump(preg_match('/[0-9]{2}/', $message, $matches));
var_dump($matches);

// Select the word '30th' from the input string
var_dump(preg_match('/[0-9]{2}[a-z]*/', $message, $matches));
var_dump($matches);

// Search for for a digit (twice), an optional whitespace
// Followed by a character repeated unlimited number of times
var_dump(preg_match('/[0-9]{2} ?[a-z]*/', $message, $matches));
var_dump($matches);

// Search words that start with either an uppercase or lowercase 'b'
// Followed by a character repeated once or unlimited number of times
var_dump(preg_match('/[Bb][a-zA-Z]+/', $message, $matches));
var_dump($matches);

// Search words that start with either an uppercase or lowercase 'b'
// with succeeding characters repeated at least 5 up to 7 characters maximum
var_dump(preg_match('/[Bb][a-zA-Z]{5,7}/', $message, $matches));
var_dump($matches);

// Using negation to search for the 1st instance of a character from the input string 
// that is NOT a letter or a whitespace
var_dump(preg_match('/[^a-zA-Z ]/', $message, $matches));
var_dump($matches);

// Using negation to search for the 1st instance of a character from the input string 
// that is NOT a letter, a digit or a whitespace
var_dump(preg_match('/[^a-zA-Z0-9 ]/', $message, $matches));
var_dump($matches);
