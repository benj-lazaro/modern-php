<?php

header("Content-Type: text/plain");

// Immediately rendered after being parsed
echo "Hello! I'm a content w/in an external file.\n";

// Simulates a function returning a stand-in string value as a PDO object
$stringData = "I'm a simulated a PDO object return value from a function w/in an external PHP file";
return $stringData;