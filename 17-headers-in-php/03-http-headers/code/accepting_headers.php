<?php

// Fetch the browser's User Agent, otherwise return an empty string
$userAgent = $_SERVER["HTTP_USER_AGENT"] ?? "";
echo "Browser User Agent: $userAgent <br/>";

// Identify the browser using the Request Header's User Agent
if (strpos($userAgent, 'Firefox') !== false) {
    echo "You are using Firefox! <br />";
} elseif (strpos($userAgent, 'Chrome') !== false) {
    echo "You are using Chrome! <br />";
} else {
    echo "You are using an unrecognized browser... <br />";
}

echo '<pre>';
// var_dump($_SERVER);
echo '</pre>';
