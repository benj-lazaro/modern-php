<?php
// You will be provided with 3 arrays: $hrSalaries, $salesSalaries, $itSalaries
// $hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];
// $salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300, 'Melody' => 4800];
// $itSalaries = ['Fiona' => 5300, 'George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400];

$hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];
$salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];
$itSalaries = ['George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400];

// Write your code here
$companySalaries = [];

// Consolidate departmental records
foreach ($hrSalaries as $employee => $salary):
    $companySalaries[$employee] = $salary;
endforeach;

foreach ($salesSalaries as $employee => $salary):
    $companySalaries[$employee] = $salary;
endforeach;

foreach ($itSalaries as $employee => $salary):
    $companySalaries[$employee] = $salary;
endforeach;

// Identify minimum salary
if (!empty($companySalaries)):
    $minimumSalary = min($companySalaries);

    foreach ($companySalaries as $employee => $salary):
        if ($salary === $minimumSalary):
            $lowestSalaries[$employee] = $salary;
        endif;
    endforeach;
endif;
