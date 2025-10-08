<?php

header("Content-Type: text/plain");

$message = "The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00";

$matches = null;

// Get the 1st instance of a currency value ($ or €) from the input string
var_dump(preg_match('/([$€]) ([0-9]+\.[0-9]{2})/u', $message, $matches));
var_dump($matches);

// Censor currency amount of the input string with "---"
$result = preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '---', $message);
var_dump($result);
echo "\n";

// Modify the target pattern with embedded HTML tags
// NOTE: The '$0' is a placeholder that refernces the captured entire expression

// IMPORTANT: UNSAFE and prone to unintended cross-site scripting attack surface
// $result = preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '<u> $0 </u>', $message);
// var_dump($result);
// echo "\n";

// Insert a value in-between capture groups 1 and 2
$result = preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '$1 --- $2', $message);
var_dump($result);
echo "\n";

// Censor the currency amount with "---" but keep the currency symbols intact
$result = preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '$1 ---', $message);
var_dump($result);
echo "\n";
