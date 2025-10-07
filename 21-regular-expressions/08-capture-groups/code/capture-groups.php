<?php

header("Content-Type: text/plain");

$message = "The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00";

$matches = null;

// Testing the euro sign
// echo "€";

// Extract the value of the US and Euro currencies
// NOTE: The euro sign internally requires multiple bytes 
// To be represented in memory & the regex was only to able to match a portion of it

// IMPORTANT: Regex works on a byte level; use a Unicode flag "u"
// To propertly render a character that consumes multiple bytes
var_dump(preg_match_all('/([$€]) ([0-9]+\.[0-9]{2})/u', $message, $matches));
var_dump($matches);
