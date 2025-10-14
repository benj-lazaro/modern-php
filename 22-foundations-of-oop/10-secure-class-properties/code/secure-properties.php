<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Constructor
    function __construct(
        private string $number,
        private string $holder,
        private float $balance
    ) {}

    // Class methods
    function getBalance(): float
    {
        return $this->balance;
    }

    function setBalance(float $balance)
    {
        $this->balance = $balance;
    }

    function printBalance()
    {
        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }

    function transfer(BankAccount $to, $amount = 0): bool
    {
        if ($this->balance >= $amount):
            $this->balance -= $amount;
            $to->balance += $amount;
            return true;
        else:
            return false;
        endif;
    }
}

$account1 = new BankAccount("123456789", "Olivia Mason", 1250.00);
$account1->printBalance();

// Attempt to set a new value to the private property 'balance'
// $account1->balance = 1;

// Get the current value from the private property 'balance'
$currentBalance = $account1->getBalance();
echo "The current balance is \${$currentBalance}.\n";

// Set a new value to the private property 'balance'
$account1->setBalance(9000);
$currentBalance = $account1->getBalance();
echo "The current balance is \${$currentBalance}.\n";

$account2 = new BankAccount("987654321", "Avery Morgan", 250.00);
$account2->printBalance();

$account2->transfer($account1, 200);

$account1->printBalance();
$account2->printBalance();
