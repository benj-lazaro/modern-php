<?php

// The variable $loyaltyPoints will be available to you
$loyaltyPoints = 1000;

// Write your code here
if ($loyaltyPoints >= 6000) {
    echo "You can spend 6000 Loyalty Points for a discount of 15%.";
} else if ($loyaltyPoints >= 3000) {
    echo "You can spend 3000 Loyalty Points for a discount of 5%.";
} else {
    echo "You have fewer than 3000 Loyalty Points. No discount is available.";
}
