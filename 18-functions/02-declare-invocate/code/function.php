<?php

// Instruct the browser to render the content as plain text
header('Content-Type: text/plain');

// Declare a function
function greet() {
    echo "Hello from PHP!!!\n";
    echo "Hello from PHP!!!\n";
    echo "Hello from PHP!!!\n";
}

// Call / invoke the function multiple times
greet();
echo "------\n";

greet();
echo "------\n";

greet();

