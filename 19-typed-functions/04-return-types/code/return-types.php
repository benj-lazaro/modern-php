<?php

header("Content-Type: text/plain");

// Function that explicitly accepts & returns a Union type value
function add_five(int|float $number): int|float
{
    return $number + 5;
}


var_dump(add_five(5));
var_dump(add_five(5.5));

// Function explicitly coerces a string value into an integer
var_dump(add_five("5"));
