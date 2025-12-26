<?php

header("Content-Type: text/plain");

// External data
$what = "Mars!";

// Anonymous Function
$print_5x = function() use($what) {
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
    var_dump("Hello " . $what);
};

// Execute Function
$print_5x();
