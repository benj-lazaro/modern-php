<?php

header("Content-Type: text/plain");

// Add an integer 5 to the passed argument value
function add_five(int $number)
{
    // PHP implicitly converts the value into an integer
    var_dump($number);
    return $number + 5;
}

// Passing a string value ot the URL parameter 'id' triggers a Fatal error
// Omitting the URL parameter 'id', defaults to an integer of 0
$id = $_GET['id'] ?? 0;

// NOTE: $_GET[] returns a value of data type string
var_dump($id);
var_dump(add_five($id));


// Prints the string argument value 5x
function print_5x(string $message)
{
    echo "{$message}\n";
    echo "{$message}\n";
    echo "{$message}\n";
    echo "{$message}\n";
    echo "{$message}\n";
}

print_5x("Hello");

// Triggers a Fatal error before the scipt is executed
// print_5x(['message' => 'Hello']);


function sum_prices(array $prices)
{
    $sum = 0;

    foreach ($prices as $price):
        $sum = $sum + $price;
    endforeach;

    return $sum;
}

$prices = [1, 2, 3];
var_dump(sum_prices($prices));

// Triggers a Fatal error BUT UNABLE to IDENTIFY which parameter caused it
$items = [1, 2, "pc"];
var_dump(sum_prices($items));
