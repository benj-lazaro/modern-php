<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Generates an array of uppercased letters of the alphabet
function gen_alphabet(): array
{
    // Get the starting & ending letter's unicode number (int)
    $A = ord("A");
    $Z = ord("Z");

    $letters = [];

    for ($letter = $A; $letter <= $Z; $letter++):
        // Convert unicode number to their corresponding character (string)
        $letters[] = chr($letter);
    endfor;

    return $letters;
}
