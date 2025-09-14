<?php

header("Content-Type: text/plain");

// Require 'helper' functions; may contain an identical named function
require __DIR__ . '/helper/funtctions.inc.php';

// A named function that does nothing
function f() {}

var_dump(function_exists("f"));
