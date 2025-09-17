<?php

header("Content-Type: text/plain");

// Write your code here
function extractOffset($timezone)
{
    if ($timezone === "UTC"):
        return 0;
    endif;

    $offset = (int) substr($timezone, -2);
    return $offset;
}

function calculateTimeOverlap($participants)
{
    $startHourUTC = 12;
    $endHourUTC = 18;
    $overlap = [];

    foreach ($participants as $participant):
        $offset = extractOffset($participant['Timezone']);

        $start = $startHourUTC + $offset;
        $end = $endHourUTC + $offset;

        if (empty($overlap)):
            $overlap = ['start' => $start, 'end' => $end];
        else:
            $overlap['start'] = max($overlap['start'], $start);
            $overlap['end'] = min($overlap['end'], $end);

            // Check if there is NO overlap
            if ($overlap['start'] >= $overlap['end']):
                return null;
            endif;
        endif;
    endforeach;

    return $overlap;
}

function suggestOptimalMeetingTime($participants = [
    ["Name" => "Default", "Timezone" => "UTC"]
])
{
    $overlap = calculateTimeOverlap($participants);

    if (!empty($overlap)):
        echo 'Suggested meeting time: ' . $overlap['start'] . ' to ' . $overlap['end'] . " UTC";
    else:
        echo 'No available meeting time for these time zones.';
    endif;
}

// Test case
$participants = [
    ["Name" => "Max", "Timezone" => "UTC-3"],
    ["Name" => "Charlie", "Timezone" => "UTC+1"],
    ["Name" => "Alex", "Timezone" => "UTC+2"],
    ["Name" => "Nina", "Timezone" => "UTC"]
];

suggestOptimalMeetingTime($participants);
