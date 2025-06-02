<?php

echo '...';

// Parse error
// Violates variable name syntax
pageTitle = "A restaurant website";
echo $pageTitle;

// Fatal error
// Calling a non-existent user-defined function
pageTitle();

// Warning
// Accessing a non-existent variable
echo $nonExistentVariable;

// Including a non-existent file
include 'doesnotexist.php';
