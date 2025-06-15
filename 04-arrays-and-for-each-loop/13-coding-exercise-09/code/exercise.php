<?php

// The arrays $waitingList and $removeFromList are predefined for your use in the background
// But you have to create the arrays $cleanedWaitingList and $selectedParticipants on your own

$waitingList = ['Dawn White', 'Frank Smith', 'Bob Carter', 'Charlie Davis', 'Eve Black', 'Alice Brown', 'Alice Brown', 'Charlie Davis', 'Grace Jones', 'Hank Green', 'Eve Black', 'Dawn White'];

$removeFromList = ['Dawn White', 'Charlie Davis'];
// Write your code here

// List cleaning
if (!empty($waitingList)) {
    $waitingList = array_unique($waitingList);

    foreach ($waitingList as $participant) {
        if (!in_array($participant, $removeFromList)) {
            $cleanedWaitingList[] = $participant;
        }
    }

    // Initial selection
    if (!empty($cleanedWaitingList)) {
        sort($cleanedWaitingList);
    } else {
        $cleanedWaitingList = [];
    }

    $headCount = 0;
    foreach ($cleanedWaitingList as $participant) {
        if ($headCount !== 5):
            $selectedParticipants[] = $participant;
            $headCount += 1;
        endif;
    }

?>

    <ul>
        <?php foreach ($cleanedWaitingList as $person): ?>
            <?php if (in_array($person, $selectedParticipants)): ?>
                <li><?php echo $person; ?>✅</li>
            <?php else: ?>
                <li><?php echo $person; ?>❌</li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

<?php } ?>