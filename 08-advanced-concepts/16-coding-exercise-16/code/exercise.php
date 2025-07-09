<?php

// You will be provided with the $emailTemplate string, the $recipient and $segmentContent associative arrays and the $events array

$emailTemplate = "Dear [NAME],\n\nWe're excited to share with you this week's featured article:\n\n[ARTICLE]\n\nUpcoming Events:\n[EVENTS]\n\nBest regards,\nYour Friendly Team";

$recipient = ['name' => 'Alice', 'segment' => 'Tech Enthusiast', 'email' => 'alice@example.com'];

$segmentContent = [
    'Tech Enthusiast' => "The Latest in Tech: Top Gadgets",
    'Health Guru' => "Transform Your Lifestyle: The Best of Health and Fitness",
];

$events = [
    "Webinar on Future Tech Trends",
    "Photography Workshop",
    "Health and Wellness Retreat"
];

// Write your code here
if (!empty($emailTemplate)):
    $name = $recipient['name'];

    $segment = $recipient['segment'];
    $segment = $segmentContent[$segment];

    $events = implode(", ", $events);
    $events = "- " . $events;
    $events = str_replace(", ", "\n- ", $events);

    $personalizedEmail = str_replace(['[NAME]', '[ARTICLE]', '[EVENTS]'], [$name, $segment, $events], $emailTemplate);
endif;
