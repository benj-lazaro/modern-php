<?php

// You will be provided with the $companySalaries array
$companySalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500, 'John' => 9500];

// Write your code here
$totalSalary = 0;
$employeeCount = count($companySalaries);
$averageSalary = [];
$adjustedTotalSalary = 0;

if (!empty($companySalaries)):
    // Compute the average salary
    foreach ($companySalaries as $salary):
        $totalSalary += $salary;
    endforeach;

    $averageSalary = $totalSalary / $employeeCount;

    // Adjust salary records
    foreach ($companySalaries as $employee => $salary):
        if ($salary < $averageSalary):
            $companySalaries[$employee] = $salary + 200;
        elseif ($salary > $averageSalary):
            $companySalaries[$employee] = $salary - ($salary * 0.05);
        endif;
    endforeach;

    // Evaluate financial impact
    foreach ($companySalaries as $salary):
        $adjustedTotalSalary += $salary;
    endforeach;

    if ($totalSalary > $adjustedTotalSalary):
        $netDifference = $totalSalary - $adjustedTotalSalary;
        echo "The net impact of the salary adjustments is a savings of \${$netDifference} for the company.";
    elseif ($totalSalary <= $adjustedTotalSalary):
        $netDifference = $adjustedTotalSalary - $totalSalary;
        echo "The net impact of the salary adjustments is a cost increase of \${$netDifference} for the company.";
    endif;

endif;
