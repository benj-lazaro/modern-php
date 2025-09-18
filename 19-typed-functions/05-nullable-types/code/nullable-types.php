<?php

header("Content-Type: text/plain");

// Function with a Union type that includes a null value
// Returns a value of type string or null
function f(int|float|null $a): ?string
{
    // return "Hello there...";
    return null;
}

// Function that accepts a string or null value
// 
function print_5x(?string $message)
{
    if (!empty($message)):
        echo "{$message}\n";
        echo "{$message}\n";
        echo "{$message}\n";
        echo "{$message}\n";
        echo "{$message}\n";
    endif;
}

// Passes an argument value of type string
print_5x("Typings are amazing");

$news1 = [
    "title" => "News headline",
];
print_5x($news1["title"]);

// Passes an argument value of type null
$news2 = [
    "title" => null,
];
print_5x($news2["title"]);
