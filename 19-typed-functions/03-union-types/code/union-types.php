<?php

header("Content-Type: text/plain");

// Function with a Union type parameter of int & float
function add_five(int|float $number)
{
    return $number + 5;
}

var_dump(add_five(5));
var_dump(add_five(3.141));


// Function with a Union type parameter of array, boolean & string
function f(array|bool|string $a)
{
    var_dump($a);
}

f([1, 2, 3]);

f(["name" => "John Wick", "alias" => "Babayaga"]);

f(true);

f("This is a test");
