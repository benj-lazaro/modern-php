<?php

// Redirect users to the specified local file
header("Location: file.html");

// An attempt for redirecting indefinitely
// header("Location: redirect.php");

// Ensures termination of the script in the event of an infinite redirect
die();

// This line will NOT be rendered in the browser
echo "This is a post redirect test message";
