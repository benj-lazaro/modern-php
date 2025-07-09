<?php

// You will be provided with the $emailContent string
$emailContent = "Dear alex  ,\n\nWe hope this message finds you well.\n\nThis month, we are focusing on personal growth and innovation. Don't miss out on our exclusive insights!\n\nBest wishes,\nYour Discovery Network Team\nP.S. Check out our latest blog post!";

// Write your code here

if (!empty($emailContent)):
    $splitContent = explode("\n\n", $emailContent);
    $salutation = $splitContent[0];
    $greetings = $splitContent[1];
    $mainBody = trim($splitContent[1] . $splitContent[2]);
    $signature = $splitContent[3];

    // Generate email preview
    $emailPreview = substr($greetings, 0, 30) . '...';
    echo $emailPreview . "<br />";

    // Main body count
    $charCount = strlen($mainBody);
    echo $charCount . "<br />";

    // Standardize salutation
    $splitSalutation = explode(" ", $salutation);
    $splitSalutation[1] = ucfirst($splitSalutation[1]);
    $salutation = implode(" ", $splitSalutation);

    echo $salutation . "<br />";

    $splitContent[0] = $salutation;
    $updateEmailContent = implode(" ", $splitContent);

    echo $updateEmailContent . "<br />";

endif;
