<?php

use Dom\Attr;

header("Content-Type: text/plain");

class Room
{
    public $roomNumber;
    public $rate;
    public $amenities;

    function __construct(int $roomNumber, float $rate, array $amenities)
    {
        $this->roomNumber = $roomNumber;
        $this->rate = $rate;
        $this->amenities = $amenities;
    }

    public function getRoomNumber(): int
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

    public function createDescription(): string
    {
        $description = "";

        foreach ($this->amenities as $amenity):
            $description .= $amenity->description . " ";
        endforeach;

        return $description;
    }
}

class Amenity
{
    public $name;
    public $movable;
    public $description;

    function __construct(string $name, bool $movable, string $description)
    {
        $this->name = $name;
        $this->movable = $movable;
        $this->description = $description;
    }
}


// Test case
$espressoMachine = new Amenity('Espresso Machine', true, 'Single serve espresso machine with complimentary coffee pods.');
$balconyView = new Amenity('Balcony View', false, 'Private balcony with ocean view.');
$hotTub = new Amenity('Hot Tub', false, 'In-room hot tub with adjustable temperature settings.');

$room47 = new Room("47", 100.00, [$espressoMachine, $balconyView, $hotTub]);
var_dump($room47);
var_dump($room47->createDescription());
