<?php

// Load the file index.json directly from the local filesystem
$content = file_get_contents(__DIR__ . "/../../data/index.json");

// Decode JSON content into an Associative array (i.e. 'true' parameter)
$data = json_decode($content, true);
var_dump($data);
echo "<br /> <br />";

// To access the property 'city' of the 1st element
var_dump($data[0]['city']);
echo "<br /> <br />";

// To determine the size of a file
echo "singapore.json.bz2 filesize: " . filesize(__DIR__ . "/../../data/singapore.json.bz2") . " bytes";

// To check for .bz2 support
phpinfo();
