<?php

header("Content-Type: text/plain");

// Interface declaration
interface Car
{
    // Method declaration ONLY; reusable piece of code
    public function drive();
}

// Class declarations that implemented the Interface "Car"
class FuelCar implements Car
{
    // Class' specific implementation of the Interface Method "drive()"
    public function drive()
    {
        echo "The car is driving and burning fuel.\n";
    }
}

class ElectricCar implements Car
{
    public function drive()
    {
        echo "The car is driving and consuming electricity.\n";
    }
}

// Normal function that accepts an object instantiated from a Class that implements the Interface "Car"
function transportGoods(Car $vehicle)
{
    // Calls the respective implementation of the method "drive()"
    $vehicle->drive();
}

// Instantiate an object from the Class "FuelCar"
$fuelCar = new FuelCar();

// Instantiate an object from the Class "ElectricCar"
$eletricCar = new ElectricCar();

// Accepts ONLY a valid object as argument value
transportGoods($fuelCar);
transportGoods($eletricCar);
