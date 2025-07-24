<?php

// The variables $totalEnergyConsumption, $monthlyIncrease, $efficiencyImprovement and $energyCapacityThreshold will be provided to you

$totalEnergyConsumption = 100000;
$monthlyIncrease = 500;
$efficiencyImprovement = 0.0005;
$energyCapacityThreshold = 150000;

// Write your code here
$monthCount = 0;

while ($totalEnergyConsumption < $energyCapacityThreshold):
    $totalEnergyConsumption += $monthlyIncrease;
    $totalEnergyConsumption *= (1 - $efficiencyImprovement);

    if ($monthCount > 600) break;
    $monthCount++;
endwhile;

if ($monthCount <= 600):
    echo "It will take $monthCount months to reach or exceed the threshold of $energyCapacityThreshold kWh.";
else:
    echo "The energy consumption threshold of $energyCapacityThreshold kWh will not be met within 50 years.";
endif;
