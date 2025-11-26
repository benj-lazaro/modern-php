<?php

header("Content-Type: text/plain");

// Parent Class
class Animal {
    // Method(s)
    public function move() {
        echo "Animal::move() has been called\n";
    }

    public function eat() {
        echo "Animal::eat() has been called\n";
    }
}

// Child Class
class Dog extends Animal {
    // Method(s)
    public function bark() {
        echo "Dog::bark() has been called\n";
    }

    // Overrides inherited Method from Parent class
    // #[\Override] ==> PHP 8.3 & above specific override annotation
    public function move() {
        echo "Dog::move() has been called\n";
    }

}

$animal = new Animal();
$animal->move();
$animal->eat();

$dog = new Dog();
$dog->move();
$dog->bark();
