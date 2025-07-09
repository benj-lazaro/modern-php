<?php

// You will be provided with the $emailContent string
$emailContent = "Dear alex  ,\n\nWe hope this message finds you well.\n\nThis month, we are focusing on personal growth and innovation. Don't miss out on our exclusive insights!\n\nBest wishes,\nYour Discovery Network Team\nP.S. Check out our latest blog post!";

// Write your code here
if (!empty($emailContent)):
    // Generate email preview
    $afterSalutation = strpos($emailContent, ',') + 3;
    $beforeSignature = strpos($emailContent, '!') + 3;
    $emailPreview = substr($emailContent, $afterSalutation, 30) . '...';

    // Count characters in the main body
    $bodyStart = strpos($emailContent, ',') + 4;
    $bodyEnd = strpos($emailContent, "Best wishes") + 1;
    $charCount = strlen(substr($emailContent, $bodyStart, $bodyEnd - $bodyStart));

    // Standardize salutation
    $beforeName = strpos($emailContent, "Dear ") + 5;
    $afterName = strpos($emailContent, ",");
    $sizeName = $afterName - $beforeName;

    $updateName = trim(substr($emailContent, $beforeName, $sizeName));
    $updateName = strtoupper(substr($updateName, 0, 1)) . strtolower(substr($updateName, 1));

    $beforeUpdateName = substr($emailContent, 0, $beforeName);
    $afterUpdateName = substr($emailContent, $afterName);
    $updatedEmailContent = $beforeUpdateName . $updateName . $afterUpdateName;
endif;
