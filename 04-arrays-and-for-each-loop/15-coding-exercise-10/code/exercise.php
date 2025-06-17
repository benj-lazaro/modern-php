<?php

// The arrays $waitingList and $priorityParticipants and the string $individualName are predefined for your use in the background
// But you have to create the arrays $finalAttendees and $backupCandidates and the string $individualStatus on your own

$waitingList = [
    'Alex Reed',
    'Blake Jordan',
    'Casey Smith',
    'Drew Alex',
    'Elliot Ford',
    'Finley Harper',
    'Jordan Kay',
    'Kim Lee',
    'Liam Park',
    'Morgan Drew'
];

$priorityParticipants = [
    'Jordan Kay', // In the waiting list and has priority
    'Sam Taylor', // Not in the waiting list but has priority
    'Zane Pryor',  // Not in the waiting list but has priority
    // 'John Wick',
    // 'John Constantine',
    // 'Thomas Anderson',
    // 'Trinity',
    // 'Tiffany',
    // 'Morpheus',
    // 'Niobe',
];

$individualName = 'Morgan Drew';
// Write your code here

if (!empty($waitingList)):
    // Priority inclusion & selection
    $finalSeatCount = 5;
    $finalAttendees = array_slice(array_unique($priorityParticipants), 0, $finalSeatCount);
    $availableSeats = $finalSeatCount - count($finalAttendees);

    if ($availableSeats !== 0):
        $chanceAttendees = array_slice(array_unique($waitingList), 0, $availableSeats);
        $finalAttendees = array_unique(array_merge($finalAttendees, $chanceAttendees));
        sort($finalAttendees);
    else:
        sort($finalAttendees);
    endif;

    // Backup candidates identification
    $backupSeats = 3;
    $backupCandidates = array_slice(array_unique($priorityParticipants), 5, $backupSeats);
    $availableBackupSeats = $backupSeats - count($backupCandidates);

    if ($availableBackupSeats !== 0):
        $waitingChanceAttendees = array_slice(array_unique($waitingList), $availableSeats, $availableBackupSeats);
        $backupCandidates = array_merge($backupCandidates, $waitingChanceAttendees);
    endif;

    foreach ($backupCandidates as $attendee) {
        echo "Hey {$attendee}, we want to inform you that you are one of our backup candidates. 🥳" . "<br />";
    }

    // Individual status inquiry
    if (in_array($individualName, $finalAttendees)):
        $individualStatus = "Final Attendee";
    elseif (in_array($individualName, $backupCandidates)):
        $individualStatus = "Backup Candidate";
    elseif (in_array($individualName, $waitingList)):
        $waitingListOffset = $availableSeats + $availableBackupSeats;
        $remainingWaitingList = array_slice($waitingList, $waitingListOffset);
        $position = array_search($individualName, $remainingWaitingList);
        $individualStatus = "Waiting, position " . $position + 1;
    else:
        $individualStatus = "Not found";
    endif;

    echo $individualStatus;

endif;
