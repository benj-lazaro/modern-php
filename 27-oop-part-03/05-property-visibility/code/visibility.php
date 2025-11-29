<?php

header("Content-Type: text/plain");

// Parent Class
class Animal
{
    // Constructor
    public function __construct(private int $weight) {}

    // Methods
    public function move()
    {
        echo "Animal::move() has been called\n";
    }

    public function eat()
    {
        // Private Property "weight" accessible w/in its own Class
        echo "Animal::eat() has been called ({$this->weight})\n";
    }
}

// Child Class
class Dog extends Animal
{
    // Constructor 
    public function __construct(public string $breed, $weight)
    {
        echo "A new dog object is born\n";
        parent::__construct($weight);
    }

    // Methods
    public function bark()
    {
        // Private Property "weight" of the Parent Class is NOT inherited (i.e. inaccessible)
        echo "Dog::bark() has been called (breed: {$this->breed}, weight: {$this->weight})\n";
    }

    public function move()
    {
        echo "Dog::move() has been called\n";
    }
}

$dog = new Dog("Golden Retriever", 30);
var_dump($dog);
$dog->move();
$dog->bark();
$dog->eat();
