<?php

header("Content-Type: text/plain");

// Parent Class
class Animal
{
    // Constructor
    public function __construct(public int $weight) {}

    // Methods
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

    // Constructor overrides inherited constructor but accesses inherited property "$weight"
    public function __construct(public string $breed, $weight)
    {
        echo "A new dog object is born\n";
        parent::__construct($weight);
    }

    // Methods
    public function bark()
    {
        echo "Dog::bark() has been called (breed: {$this->breed}, weight: {$this->weight})\n";
    }

    public function move()
    {
        echo "Dog::move() has been called\n";
    }
}

$dog = new Dog("Golden Retriever", 30);
// Shows that the inherited property "$weight" is part of the Child Class "Dog"
var_dump($dog);

$dog->move();
$dog->eat();
$dog->bark();
