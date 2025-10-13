<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Constructor
    function __construct(
        public string $number,
        public string $holder,
        public float $balance
    ) {}

    // Class methods
    function printBalance()
    {
        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }

    function transfer(BankAccount $to, $amount = 0): bool
    {
        // var_dump($this);
        // var_dump($to);
        // var_dump($amount);

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

$account2 = new BankAccount("987654321", "Avery Morgan", 250.00);
$account2->printBalance();

if ($account2->transfer($account1, 200)):
    echo "Request transfer successful\n";
else:
    echo "Request transfer failed\n";
endif;

$account1->printBalance();
$account2->printBalance();

// A potential problem; property value can easily be overriden
$account1->balance = 10000000;
$account1->printBalance();
