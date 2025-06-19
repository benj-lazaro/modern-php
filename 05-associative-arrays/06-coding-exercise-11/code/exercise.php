<?php
// You will be provided with 3 arrays: $hrSalaries, $salesSalaries, $itSalaries
$hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];
$salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];
$itSalaries = ['Fiona' => 5300, 'George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400];

// Write your code here
$hrTotal = 0;
$salesTotal = 0;
$itTotal = 0;
$totals = [];

// Calculate department expenditures
foreach ($hrSalaries as $salary):
    $hrTotal += $salary;
endforeach;

foreach ($salesSalaries as $salary):
    $salesTotal += $salary;
endforeach;

foreach ($itSalaries as $salary):
    $itTotal += $salary;
endforeach;

$totals["HR"] = $hrTotal;
$totals["Sales"] = $salesTotal;
$totals["IT"] = $itTotal;

// Determine the highest expenditures
$highExpenditure = max($totals);
$maxDept = array_search($highExpenditure, $totals);

echo $maxDept;
