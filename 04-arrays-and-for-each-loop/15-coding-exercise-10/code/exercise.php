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
];

$individualName = 'Kim Lee';
// Write your code here

// Priority inclusion & selection
$workshopAvailableSeats = 5;

if (empty($waitingList)):
    $finalAttendees = array_slice(array_unique(($priorityParticipants)), 0, $workshopAvailableSeats);
else:
    foreach ($waitingList as $individual):
        if (!in_array($individual, $priorityParticipants)):
            $cleanedWaitingList[] = $individual;
        endif;
    endforeach;

    $finalAttendees = array_slice(array_unique(($priorityParticipants)), 0, $workshopAvailableSeats);
    $vacantFinalSeats = $workshopAvailableSeats - count($finalAttendees);

    if ($vacantFinalSeats !== 0):
        $chanceAttendees = array_slice($cleanedWaitingList, 0, $vacantFinalSeats);
        $finalAttendees = array_merge($finalAttendees, $chanceAttendees);
    endif;
endif;

sort($finalAttendees);

// Backup candidates identification
$backupAvailableSeats = 3;

$backupCandidates = array_slice(array_unique($priorityParticipants), $workshopAvailableSeats, $backupAvailableSeats);
$vacantBackupSeats = $backupAvailableSeats - count($backupCandidates);

if ($vacantBackupSeats !== 0):
    $potentialCandidates = array_slice($cleanedWaitingList, $vacantFinalSeats, $vacantBackupSeats);
    $backupCandidates = array_merge($backupCandidates, $potentialCandidates);
endif;

foreach ($backupCandidates as $individual) {
    echo "Hey {$individual}, we want to inform you that you are one of our backup candidates. 🥳";
}

// Individual status inquiry
if (empty($waitingList)):
    $tempWaitList = $priorityParticipants;
    $offset = $workshopAvailableSeats + $backupAvailableSeats;
else:
    $tempWaitList = $cleanedWaitingList;
    $offset = $vacantFinalSeats + $backupAvailableSeats;
endif;
if (in_array($individualName, $finalAttendees)):
    $individualStatus = "Final Attendee";
elseif (in_array($individualName, $backupCandidates)):
    $individualStatus = "Backup Candidate";
elseif (in_array($individualName, $tempWaitList)):
    $pendingAttendees = array_slice($tempWaitList, $offset);
    $position = array_search($individualName, $pendingAttendees) + 1;
    $individualStatus = "Waiting, position {$position}";
else:
    $individualStatus = "Not found";
endif;
