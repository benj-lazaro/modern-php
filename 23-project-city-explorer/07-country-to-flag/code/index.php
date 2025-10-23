<?php

// Turn character 'A' in its corresponding numeric (int) code
// var_dump(ord("A"));
// echo "<br />";

// Turn numeric code '65' into its corresponding character
// var_dump(chr(ord("A")));
// echo "<br />";

// Render character 'A' using its corresponding numeric number
// echo "&#65;";
// echo "<br />";

// var_dump(mb_chr(127482) . mb_chr(127480));

function get_flag_for_country(string $iso2): string
{
    $iso2 = strtolower($iso2);

    if (strlen($iso2) !== 2):
        // echo "get_flag_for_country(): {$iso2} cannot be called, string must exactly be 2 characters long";
        // die();
        return $iso2;
    endif;

    return mb_chr(127462 + ord($iso2[0]) - ord('a')) .
        mb_chr(127462 + ord($iso2[1]) - ord('a'));
}

var_dump(get_flag_for_country('us'));
var_dump(get_flag_for_country('ph'));

die();

// Code below is tentatively ignored for now
require __DIR__ . '/inc/all.inc.php';

$worldCityRepository = new WorldCityRepository($pdo);
$entries = $worldCityRepository->fetch();


render('index.view', ['entries' => $entries]);
