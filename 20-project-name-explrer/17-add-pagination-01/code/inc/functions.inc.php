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

// Renders output on selected view (page)
function render($view, $params)
{
    // Extract elements into their own variables
    extract($params);

    // Start output buffering
    ob_start();

    require __DIR__ . '/../views/pages/' . $view . '.php';

    $contents = ob_get_clean();

    // Render the layout page
    $alphabet = gen_alphabet();
    require __DIR__ . '/../views/layouts/main.view.php';
}
