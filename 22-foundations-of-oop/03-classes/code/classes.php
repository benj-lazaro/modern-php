<?php

header("Content-Type: text/plain");

// Define a new class named BankAccount
class BankAccount
{
    public string $number;
    public string $holder;
    public float $balance;
}

// Instantiate an object from the BankAccount class
$account1 = new BankAccount();

// Assign values to the object's properties
$account1->number = '123456789';
$account1->holder = "Olivia Mason";
$account1->balance = 1250.00;

// var_dump($account1);

// Expects an instantiated object from the BankAccount class as argument value
function print_balance(BankAccount $account)
{
    echo "The balance of account #{$account->number} is {$account->balance}.\n";
}

print_balance($account1);

// Attempt to pass a different type as argument value
// print_balance(["number" => '1212', "holder" => "John Malkovich", "balance" => 1010]);
