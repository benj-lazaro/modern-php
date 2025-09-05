<?php

// Generate 5000 whitespace characters; within the limits of PHP's Output Buffering
for ($x = 0; $x < 4094; $x++):
    echo ' ';
endfor;

// External file with whitespaces; pushing PHP's Output Buffering beyond its default limit
include __DIR__ . '/other.php';

// Informs the browser that the file to be rendered as plain text file, NOT as HTML document
header("Content-Type: text/plain");

// Display the size of PHP's 'output_buffering' 
var_dump(ini_get("output_buffering"));
echo $title;

// Output the content of the file
echo file_get_contents('pg1513.txt');
