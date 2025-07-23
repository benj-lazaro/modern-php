<?php

// The variables $totalEnergyConsumption, $monthlyIncrease, $efficiencyImprovement and $years will be provided to you
$totalEnergyConsumption = 50000;
$monthlyIncrease = 200;
$efficiencyImprovement = 0.001;
$years = 5;

// Write your code here
$newEnergyConsumption = 0;

for ($forecastYear = 1; $forecastYear <= $years; $forecastYear++):
    for ($month = 1; $month <= 12; $month++):
        $totalEnergyConsumption += $monthlyIncrease;
        $totalEnergyConsumption *= (1 - $efficiencyImprovement);
    endfor;
endfor;

$forecastedEnergyConsumption = round($totalEnergyConsumption, 2);
