<?php

header("Content-Type: text/plain");

$what = "Mars!";

// Imports the variable w/in the anonymous function's closure
$print_5x = function() use($what) {
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
};

// Execute anonymous function
$print_5x();
