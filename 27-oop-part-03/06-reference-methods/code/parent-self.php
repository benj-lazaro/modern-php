<?php

header("Content-Type: text/plain");

// Parent Class
class Animal
{
    public function move()
    {
        echo "Animal::move() has been called\n";
    }

    public function eat()
    {
        echo "Animal::eat() has been called\n";

        self::move(); // Refers to the Method defined w/in this Class
        $this->move(); // Refers to the Method move() of the object instantiated from the Child Class "Dog"
    }
}

// Child Class
class Dog extends Animal
{
    public function move()
    {
        echo "Dog::move() has been called\n";
        parent::move(); // Calls the Parent Class Method "move()"
    }
}

// Instatiate an object from the Child Class "Dog"
$dog = new Dog();
$dog->move();
echo "\n";
$dog->eat();
