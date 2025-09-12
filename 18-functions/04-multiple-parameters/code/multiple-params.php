<?php

// Instruct the browser to render the content as plain text
header('Content-Type: text/plain');

// Declare a function with a defined parameter & default value
function greet($stringParameter, $count = 1)
{
    for ($x = 0; $x < $count; $x++) :
        echo "{$stringParameter}\n";
    endfor;
}

// Pass argument values to the function & invoke it
greet("Hello from PHP!!!", 4);
echo "------\n";

greet("Hello from Mars!", 3);
echo "------\n";

greet("Hello from PHP again...", 2);
echo "------\n";

greet("Hello there");
