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

    public function updatePrice(float $newPrice)
    {
        return $this->price = $newPrice;
    }

    public function applyDiscount(float $percentage)
    {
        return $this->price = $this->price - ($this->price * ($percentage / 100));
    }
}

// Write your code here
class Food extends Product
{
    private $ingredients;
    private $macroNutrients;
    private $calories;

    public function __construct(string $id, string $name, float $price, string $description, array $ingredients, array $macroNutrients)
    {
        $this->ingredients = $ingredients;
        $this->standardizeIngredients();

        if ($this->containsUnhealthyIngredients($ingredients)):
            $description .= " Beware: Do not consume too much.";
        endif;

        parent::__construct($id, $name, $price, $description);

        $this->macroNutrients = $macroNutrients;
        $this->updateCalories();
    }

    private function standardizeIngredients()
    {
        foreach ($this->ingredients as $key => $ingredient):
            $this->ingredients[$key] = strtolower($ingredient);
        endforeach;
    }

    private function containsUnhealthyIngredients($ingredients)
    {
        $unhealthyIngredients = ['palm oil', 'salt', 'sugar'];

        foreach ($this->ingredients as $key => $ingredient):
            if (in_array($ingredient, $unhealthyIngredients)):
                return true;
            endif;
        endforeach;
        return false;
    }

    public function getMacroInfo($macro)
    {
        return $this->macroNutrients[$macro] ?? 0;
    }

    public function updateCalories()
    {
        $carbs = $this->getMacroInfo("carbs");
        $proteins = $this->getMacroInfo("proteins");
        $fats = $this->getMacroInfo("fats");

        $this->calories = ($carbs + $proteins) * 4 + ($fats * 9);
    }

    public function applyDiscount(float $percentage)
    {
        parent::applyDiscount($percentage);

        if ($this->calories < 200):
            $currentPrice = $this->getPrice();
            $newPrice = $currentPrice * 0.9;
            $this->updatePrice($newPrice);
        endif;
    }
}
