<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Class property
    public float $balance;

    // Constructor
    function __construct(
        public string $number,
        public string $holder,
        float $balance
    ) {
        // Business logic that prevents a negative balance
        $this->balance = max(0, $balance);
    }

    // Class method
    function printBalance()
    {
        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }
}

$account1 = new BankAccount("123456789", "Olivia Mason", 1250.00);
$account1->printBalance();
