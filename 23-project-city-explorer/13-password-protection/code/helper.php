<?php
// Helper file that verifies if password protection via ".htpasswd" can be used

// Checks PHP settings in the Apache web server
// Look for "Server API", it should have the value of "Apache 2.0 Handler"
phpinfo();

// Generates hashed password using supported encryption algorithms of Apache web server
// To be used with the corresponding user account in ".htpasswd"
var_dump(password_hash('password', PASSWORD_BCRYPT));
echo "<br />";

// Get the full path of the ".htpasswd" file
var_dump(__DIR__ . '/.htpasswd');
echo "<br />";

// Peek on the HTTP headers
// Look for "PHP_AUTH_USER" and "PHP_AUTH_PW"
var_dump($_SERVER);
