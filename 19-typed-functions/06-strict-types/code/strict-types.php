<?php
// Enables the strict type
declare(strict_types=1);

header("Content-Type: text/plain");

// Function that expects an integer and return an integer
function add_five(int $number): int
{
    return $number + 5;
}

// The value of the URL parameter 'id' is of string type
// Explicitly typecast the value into an integer
$id = (int) ($_GET['id'] ?? 0);
var_dump($id);
var_dump(add_five((int) $id));


// Function that expects a string & returns a void (nothing)
function print_5x(string $message): void
{
    echo ("{$message} \n");
    echo ("{$message} \n");
    echo ("{$message} \n");
    echo ("{$message} \n");
    echo ("{$message} \n");
}

print_5x("Hello there!");

// Explicity type cast $id to a string; previously type casted into an integer
print_5x((string) $id);

// VS code immediately flags this Fatal error prior to execution
// print_5x(123);
