<?php

// You will provided with the $emailContent variable
$emailContent = "Subject: Unlock Your Potential with Us!\n\nDear Alex,\n\nWe hope this message finds you well.\n\nQuote of the Month:\n\nDr. Albert Szent-Györgyi: 'Innovation is seeing what everybody has seen and thinking what nobody has thought.'\n\nBest wishes,\nYour Discovery Network Team\nP.S. Don't miss our special announcement next month!";

// Write your code here

if (!empty($emailContent)):
    // Extract the 'Quote of the Month'
    $splitted = explode("\n\n", $emailContent);

    $targetIndex = array_search('Quote of the Month:', $splitted) + 1;

    // Extract the quote and its author
    $targetContent = explode(":", $splitted[$targetIndex]);
    $author = $targetContent[0];
    $quote = trim($targetContent[1]); // Removes the leading (and ending) whitespace

    // Reformat the Quote Display
    $reformatQuoteDisplay = $quote . " - " . $author;
    $splitted[$targetIndex] = $reformatQuoteDisplay;

    // Update & Reassemble the Email content
    $modifiedEmailContent = implode("\n\n", $splitted);

endif;
