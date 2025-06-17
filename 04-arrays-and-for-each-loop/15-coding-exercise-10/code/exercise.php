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
    'John Wick',
    'John Constantine',
    'Thomas Anderson',
    'Trinity',
    'Oracle',
    'Morpheus',
    'Niobe',
];

$individualName = 'Kim Lee';
// Write your code here
$finalSeatCount = 5;

if (!empty($waitingList)):
    // Priority inclusion & selection
    foreach ($waitingList as $attendee) :
        if (!in_array($attendee, $priorityParticipants)):
            $cleanedWaitingList[] = $attendee;
        endif;
    endforeach;

    $finalAttendees = array_slice(array_unique($priorityParticipants), 0, $finalSeatCount);
    sort($finalAttendees);

    $availableFinalSeats = $finalSeatCount - count($finalAttendees);

    if ($availableFinalSeats !== 0):
        $chanceAttendees = array_slice(array_unique($cleanedWaitingList), 0, $availableFinalSeats);
        $finalAttendees = array_unique(array_merge($finalAttendees, $chanceAttendees));
        sort($finalAttendees);
    endif;

    // Backup candidates identification
    $backupCandidateSeats = 3;

    $backupCandidates = array_slice(array_unique($priorityParticipants), $finalSeatCount, $backupCandidateSeats);
    $vacantBackupSeats = $backupCandidateSeats - count($backupCandidates);

    if ($vacantBackupSeats !== 0):
        $chanceBackupCandidates = array_slice(array_unique($cleanedWaitingList), $availableFinalSeats, $vacantBackupSeats);
        $backupCandidates = array_merge($backupCandidates, $chanceBackupCandidates);
    endif;

    foreach ($backupCandidates as $attendee) {
        echo "Hey {$attendee}, we want to inform you that you are one of our backup candidates. 🥳";
    }

    // Individual status inquiry
    if (in_array($individualName, $finalAttendees)):
        $individualStatus = "Final Attendee";
    elseif (in_array($individualName, $backupCandidates)):
        $individualStatus = "Backup Candidate";
    elseif (in_array($individualName, $cleanedWaitingList)):
        $offsetValue = $availableFinalSeats + $vacantBackupSeats;
        $remnantWaitingList = array_slice($waitingList, $offsetValue);
        $individualPosition = array_search($individualName, $remnantWaitingList);
        $individualStatus = "Waiting, position " . $individualPosition + 1;
    else:
        $individualStatus = "Not found";
    endif;

endif;
