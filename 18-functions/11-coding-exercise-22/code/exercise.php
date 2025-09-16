<?php

header("Content-Type: text/plain");

// Write your code here
function addOffset($hour, $offset)
{
    return $hour + $offset;
}

function calculateTimeOverlap($offset1, $offset2)
{
    $startHourUTC = 12;
    $endHourUTC = 18;

    $start1 = addOffset($startHourUTC, $offset1);
    $end1 = addOffset($endHourUTC, $offset1);

    $start2 = addOffset($startHourUTC, $offset2);
    $end2 = addOffset($endHourUTC, $offset2);

    $overlapStart = $start1 > $start2 ? $start1 : $start2;
    $overlapEnd = $end1 < $end2 ? $end1 : $end2;

    return $overlapStart < $overlapEnd ? [$overlapStart, $overlapEnd] : [];
}

function suggestOptimalMeetingTime($offset1, $offset2)
{
    $result = calculateTimeOverlap($offset1, $offset2);

    if (!empty($result)):
        echo 'Suggested meeting time: ' . $result[0] . ' to ' . $result[1] . " UTC";
    else:
        echo 'No available meeting time for these time zones.';
    endif;
}

// Test case
suggestOptimalMeetingTime(0, -4);
echo "\n";

suggestOptimalMeetingTime(-5, 1);
echo "\n";

suggestOptimalMeetingTime(7, 4);
echo "\n";

suggestOptimalMeetingTime(-5, 0);
echo "\n";

suggestOptimalMeetingTime(1, 11);
echo "\n";
