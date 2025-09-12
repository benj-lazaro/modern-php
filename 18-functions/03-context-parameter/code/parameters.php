<?php

// Instruct the browser to render the content as plain text
header('Content-Type: text/plain');

// Declare a function with a defined parameter
function greet($stringParameter)
{
    echo "{$stringParameter}\n";
    echo "{$stringParameter}\n";
    echo "{$stringParameter}\n";
    // Value of $stringParameter is discarded once the function exits
}

// Passing an argument value to the function & invoking it
$message = "Hello from PHP!!!";
greet($message);
echo "------\n";

greet("Hello from Mars!");
echo "------\n";

greet("Hello from PHP" . " again...");
