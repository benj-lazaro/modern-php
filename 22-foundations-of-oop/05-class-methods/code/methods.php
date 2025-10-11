<?php

header("Content-Type: text/plain");

class BankAccount
{
    // Class property
    public string $number;
    public string $holder;
    public float $balance;

    // Class method
    function printBalance()
    {
        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }
}

// Instantiate a new object from the class BankAccount
$account1 = new BankAccount();
$account1->number = "123456789";
$account1->holder = "Olivia Mason";
$account1->balance = 1250.00;

// Call the class method
$account1->printBalance();

// Instantiate another object from the class BankAccount
$account2 = new BankAccount();
$account2->number = "987654321";
$account2->holder = "Avery Morgan";
$account2->balance = 250.00;

// Call the class method
$account2->printBalance();
