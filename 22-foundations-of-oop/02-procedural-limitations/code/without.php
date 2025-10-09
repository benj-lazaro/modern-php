<?php

header("Content-Type: text/plain");

require __DIR__ . '/cloud.php';

// Modelling a simple bank acount & functions
$account1 = [
    "number" => 123456789,
    "holder" => "Olivia Manson",
    "balance" => 1250.00
];

$account2 = [
    "number" => 987654321,
    "holder" => "Avery Morgon",
    "balance" => 250.00
];

function bank_account_print_balance(array $account): void
{
    echo "The balance of account {$account['number']} is {$account['balance']}.\n";
}

// Passing a valid argument with the required properties by the function
bank_account_print_balance($account1);
bank_account_print_balance($account2);

// Passing a valid argument without the required properties by the function
// bank_account_print_balance([]);

// NOTE: The '&' is a pass-by-reference construct
// Updates the elements of the original array, NOT the implicit copy
function bank_account_transfer(array &$from, array &$to, float|int $amount): bool
{
    if ($from['balance'] >= $amount):
        $from['balance'] = $from['balance'] - $amount;
        $to['balance'] = $to['balance'] + $amount;
        return true;
    else:
        echo "Sorry. You do not have enough funds to make a bank_account_transfer.\n";
        return false;
    endif;
}

bank_account_transfer($account2, $account1, 300.00);
bank_account_print_balance($account1);
bank_account_print_balance($account2);
