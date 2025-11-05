<?php

// Sanitize user provided input and/or output text
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

// Renders the argument values in $params, to the corresponding view page in $view
// Then renders the view page onto the 'layout' page (main.view.php)
function render($view, $params)
{
    // Extract the content of the 2nd parameter 
    extract($params);

    // Starts the output buffering
    ob_start();

    // Loads the corresponding 'view' page
    require __DIR__ . '/../views/pages/' . $view . '.php';

    // Stores buffered output in $contents; cleans & terminates the output buffering; 
    $contents = ob_get_clean();

    // Loads the main 'layout' page & renders the content of $contents
    require __DIR__ . '/../views/layouts/main.view.php';
}

// Generates all letters of the alphabet as an array
function gen_alphabet()
{
    $A = ord('A');
    $Z = ord('Z');

    $letters = [];
    for ($x = $A; $x <= $Z; $x++) {
        $letters[] = chr($x);
    }
    return $letters;
}

// Returns the multibyte of each character in $iso2
function get_flag_for_country(string $iso2): string
{
    $iso2 = strtolower($iso2);

    // Check length of $iso2
    if (strlen($iso2) !== 2):
        // Returns the $iso2 value; does NOT perform Unicode convertion
        return $iso2;
    endif;

    // Return the multibyte of each character
    return mb_chr(127462 + ord($iso2[0]) - ord('a')) . mb_chr(127462 + ord($iso2[1]) - ord('a'));
}
