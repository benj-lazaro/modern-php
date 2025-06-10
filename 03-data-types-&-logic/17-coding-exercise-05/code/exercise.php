<?php

// Assume that $totalCost and $loyaltyPoints are already set
$totalCost = 10;
$loyaltyPoints = 1000;

// Write your code here
if ($loyaltyPoints >= 6000) {
    // 5% Discount
    $discount = 0.05;
    $tax = .08;
    $discountedPrice = $totalCost - ($totalCost * $discount);
    $addedTaxPrice = $discountedPrice + ($discountedPrice * $tax);
    $deductedLoyaltyPoints = $loyaltyPoints - 3000;
    $newLoyaltyPoints = ($addedTaxPrice * 100) + $deductedLoyaltyPoints;

    $tailoredMessage = "You can spend 3000 Loyalty Points for a discount of 5%. Your final price (after discount and taxes) would be \${$addedTaxPrice}. Your new Loyalty Balance would be: {$newLoyaltyPoints}.";
    echo $tailoredMessage;

    // 15% discount
    $discount = 0.15;
    $tax = .08;
    $discountedPrice = $totalCost - ($totalCost * $discount);
    $addedTaxPrice = $discountedPrice + ($discountedPrice * $tax);
    $deductedLoyaltyPoints = $loyaltyPoints - 6000;
    $newLoyaltyPoints = ($addedTaxPrice * 100) + $deductedLoyaltyPoints;

    $tailoredMessage = "You can spend 6000 Loyalty Points for a discount of 15%. Your final price (after discount and taxes) would be \${$addedTaxPrice}. Your new Loyalty Balance would be: {$newLoyaltyPoints}.";
    echo $tailoredMessage;
} else if ($loyaltyPoints >= 3000) {
    $discount = 0.05;
    $tax = .08;
    $discountedPrice = $totalCost - ($totalCost * $discount);
    $addedTaxPrice = $discountedPrice + ($discountedPrice * $tax);
    $deductedLoyaltyPoints = $loyaltyPoints - 3000;
    $newLoyaltyPoints = ($addedTaxPrice * 100) + $deductedLoyaltyPoints;

    $tailoredMessage = "You can spend 3000 Loyalty Points for a discount of 5%. Your final price (after discount and taxes) would be \${$addedTaxPrice}. Your new Loyalty Balance would be: {$newLoyaltyPoints}.";

    echo $tailoredMessage;
} else {
    $tax = .08;
    $discountedPrice = $totalCost;
    $addedTaxPrice = $discountedPrice + ($discountedPrice * $tax);
    $newLoyaltyPoints = ($addedTaxPrice * 100) + $loyaltyPoints;

    $tailoredMessage = "You have fewer than 3000 Loyalty Points. No discount is available. Your final price (after taxes) would be \${$addedTaxPrice}. Your new Loyalty Balance would be: {$newLoyaltyPoints}.";
    echo $tailoredMessage;
}
