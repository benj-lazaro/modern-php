<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Class (typed) property
    public string $number;
    public string $holder;
    public float $balance;

    // Constructor
    function __construct(string $number, string $holder, float $balance)
    {
        $this->number = $number;
        $this->holder = $holder;
        $this->balance = $balance;
    }

    // Class method
    function printBalance()
    {
        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }
}

// Without a Constructor, triggers a Fatal error caused by
// A Method accessing uninitialized typed Properties
// $account1 = new BankAccount();
// $account1->printBalance();

// Instantiate an Object with argument values to initialize its Properties
$account1 = new BankAccount("123456789", "Olivia Mason", 1250.00);
$account1->printBalance();
