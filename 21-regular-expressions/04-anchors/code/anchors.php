<?php

header("Content-Type: text/plain");

$message = "Happy 30th Birthday!";

$matches = null;

// Look for a digit at the beginning of the input string
var_dump(preg_match('/^\d/', $message, $matches));
var_dump($matches);

// Look for a pattern that starts with unlimited digits
// Followed by a literal dot then ends with unlimited digits
var_dump(preg_match('/^\d+\.\d+$/', "123.45", $matches));
var_dump($matches);


// Validate an email address pattern in the input string
// Start looking for any character repeated once to unlimited times
// Then an @ symbol followed by any character repeated once to unlimited times
// Then a normal dot followed by any character repeated once to unlimited times
var_dump(preg_match('/^.+@.+\..+$/', "user@example.com", $matches));
var_dump($matches);
