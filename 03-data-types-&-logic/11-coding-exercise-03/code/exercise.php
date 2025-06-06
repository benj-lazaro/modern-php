<?php

// Assume $price is already set
$price = 150.00;

// Write your code here
$discount = 0.30;
$flatDiscount = 10.00;
$tax = 0.20;

// Apply 30% discount to the value in $price
$discountPrice = $price - ($price * $discount);

// Apply a flat discount of $10
$flatDiscountPrice = $discountPrice - $flatDiscount;

// Add 2O% tax
$addedTaxPrice = $flatDiscountPrice + ($flatDiscountPrice * .20);

// Loyalty points
$loyaltyPoints = $addedTaxPrice * 100;

// Output message
$message = "After applying discounts and taxes, the item's price is reduced from \${$price} to \${$addedTaxPrice}, and you've earned {$loyaltyPoints} loyalty points.";

echo $message;
