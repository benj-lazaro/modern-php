<?php

header("Content-Type: text/plain");

// Abstract Parent Class
abstract class Animal
{

    // Abstract Method
    abstract protected function getWeight(): int;

    // Method
    public function move()
    {
        echo "Animal::move() has been called\n";
    }

    public function eat()
    {
        // NOTE: NOT a good example but enough to demonstrate Abstract Method
        $weight = $this->getWeight();
        echo "Animal::eat() has been called; (weight: {$weight}) \n";
    }
}

// Child Class
class Dog extends Animal
{
    // Method
    protected function getWeight(): int
    {
        return 40;
    }
}

class Cat extends Animal
{
    // Method
    protected function getWeight(): int
    {
        return 20;
    }
}

$dog = new Dog();
$dog->eat();

$cat = new Cat();
$cat->eat();
