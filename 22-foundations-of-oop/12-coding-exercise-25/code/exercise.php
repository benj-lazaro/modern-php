<?php

header("Content-Type: text/plain");

class Room
{
    // Class properties
    public $roomNumber;
    public $rate;

    // Constructor
    function __construct(int $roomNumber, float $rate)
    {
        $this->roomNumber = $roomNumber;
        $this->rate = $rate;
    }

    // Class methods
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function calculateCost($numberOfDays): ?float
    {
        if ($numberOfDays <= 0) :
            return null;
        else:
            return round($numberOfDays * $this->rate, 2);
        endif;
    }
}

// Test case
$room1 = new Room(123, 5);
var_dump($room1->getRoomNumber());
var_dump($room1->calculateCost(5));

$room2 = new Room(456, 0);
var_dump($room2->getRoomNumber());
var_dump($room2->calculateCost(5));
