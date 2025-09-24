<?php

header("Content-Type: text/plain");

// Enable output buffering
ob_start();

// Capture output & store in the output buffer
echo "Hello World!";

// Get content & then clean the output buffer
$content = ob_get_clean();
var_dump($content);

echo "----\n";

// Enable output buffering the 2nd time
ob_start();
?>

<h1>Hello World!</h1>

<?php
$content = ob_get_clean();
var_dump($content);

echo "----\n";

// Enable output buffering the 3rd time
ob_start();

require __DIR__ . '/view.php';

$content = ob_get_clean();
var_dump($content);
?>