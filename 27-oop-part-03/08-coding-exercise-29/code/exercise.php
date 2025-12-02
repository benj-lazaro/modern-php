<?php

// The Product class represents the base class for all products in the e-commerce system.
class Product
{
    protected $id;
    protected $name;
    protected $price;
    protected $description;

    // Constructor to initialize a new Product object with its properties.
    public function __construct(string $id, string $name, float $price, string $description)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function updatePrice(float $price)
    {
        return $this->price = $price;
    }

    public function applyDiscount(float $percentage)
    {
        return $this->price = $this->price - ($this->price * ($percentage / 100));
    }
}

// Write your code here
class Electronics extends Product
{
    private $voltage;
    private $warranty;

    public function __construct($id, $name, $price, $description, int $voltage, string $warranty)
    {
        $this->voltage = $voltage;
        $this->warranty = $warranty;
        parent::__construct($id, $name, $price, $description);
    }
}

class Clothing extends Product
{
    private $size;
    private $material;
    private $careInstructions;
    private $allowedSizes = ['XS', 'S', 'M', 'L', 'XL'];

    public function __construct($id, $name, $price, $description, string $size, string $material, $careInstructions)
    {
        $this->size = $this->validateSize($size);
        $this->material = $material;
        $this->careInstructions = $this->formatCareInstructions($careInstructions);
        parent::__construct($id, $name, $price, $description);
    }

    private function validateSize($size)
    {
        if (!in_array($size, $this->allowedSizes)):
            return "M";
        endif;

        return $size;
    }

    private function formatCareInstructions($instructions)
    {
        if (is_array($instructions)):
            return implode("; ", $instructions);
        endif;

        return $instructions;
    }
}
