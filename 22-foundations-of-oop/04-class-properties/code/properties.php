<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Property with declared data types
    public string $number;
    public string $holder;
    public float $balance = 0;

    // Property with no data type
    public $something;
}

// Instantiate a new object from the class BankAccount
$account = new BankAccount();

// Initialize the object's property 'something' with an empty array
$account->something = [];

// Accessing an uninitialized property; triggers a fatal error
// var_dump($account->number);

// Accessing an initialized property
// var_dump($account->something);

// Assign an int to a string property of an object
// PHP implicitly typecasts the value IF "strict_types" is DISABLED or NOT declared
// Otherwise, requires to explicitly typecast the assigned value
$account->number = (string) 1234;
var_dump($account);

// Override the initial value of property "number"
$account->number = "987654321";

// Display properties of the object
var_dump($account);
