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

    private function addAmenity(Amenity $amenity)
    {
        return $this->amenities[] = $amenity;
    }

    private function removeAmenity(string $amenityName)
    {
        foreach ($this->amenities as $index => $amenity):
            if ($amenity->name === $amenityName):
                array_splice($this->amenities, $index, 1);
                break;
            endif;
        endforeach;
    }

    private function transferAmenity(Room $to, string $amenityName)
    {
        foreach ($this->amenities as $index => $amenity):
            if ($amenity->name === $amenityName && $amenity->movable):
                $to->addAmenity($amenity);
                $this->removeAmenity($amenityName);
                break;
            endif;
        endforeach;
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
$wifi = new Amenity('WiFi', true, 'Wireless Internet access.');

$room47 = new Room("47", 100.00, [$espressoMachine, $balconyView, $hotTub]);
$room69 = new Room("69", 69.00, [$hotTub]);
