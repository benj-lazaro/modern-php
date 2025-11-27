<?php

header("Content-Type: text/plain");

// Parent Class
class Animal
{
    // Constructor
    public function __construct(public int $weight) {}

    public function move()
    {
        echo "Animal::move() has been called\n";
    }

    public function eat()
    {
        echo "Animal::eat() has been called ({$this->weight})\n";
    }
}

// Child Class
class Dog extends Animal
{
    // Overrides Parent Class' constructor
    // public function __construct()
    // {
    //     // Calls the Parent Class' constructor to initialize inherited property "weight"
    //     parent::__construct(30);
    // }

    // Alternative override of the Parent Class' constructor; with new Child Class-specific properties
    public function __construct(public string $breed, $weight)
    {
        echo "A new dog object is born\n";

        // Calls the Parent Class' constructor to initialize inherited property "weight"
        parent::__construct($weight);
    }

    public function bark()
    {
        echo "Dog::bark() has been called (breed: {$this->breed})\n";
    }

    public function move()
    {
        echo "Dog::move() has been called\n";
    }
}

$dog = new Dog("Golden Retriever", 30);
$dog->eat();
$dog->bark();
