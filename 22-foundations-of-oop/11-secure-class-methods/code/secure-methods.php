<?php

declare(strict_types=1);
header("Content-Type: text/plain");

class BankAccount
{
    // Constructor
    public function __construct(
        private string $number,
        private string $holder,
        private float $balance
    ) {}

    // Class methods
    public function getBalance(): float
    {
        return $this->balance;
    }

    private function setBalance(float $balance)
    {
        $this->balance = $balance;
    }

    private function updateFromDB()
    {
        // TODO: To be implemented!
    }

    public function printBalance()
    {
        // Adds a dollar to the balance everytime this method is called
        // $this->setBalance($this->getBalance() + 1);

        $this->updateFromDB();

        echo "The balance of account #{$this->number} is {$this->balance}.\n";
    }

    public function transfer(BankAccount $to, $amount = 0): bool
    {
        $this->updateFromDB();

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
$account2 = new BankAccount("987654321", "Avery Morgan", 250.00);

$account1->printBalance();
$account2->printBalance();
