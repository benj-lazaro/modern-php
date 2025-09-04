<?php

// Set Response Header Content-Type
header("Content-Type: image/jpeg");

// Load an image file based on the generated random number
if (rand(1, 2) === 1):
    // Reads an image file from the local filesystem & sends it back to the browser for rendering
    readfile(__DIR__ . '/IMG_0933.jpg');
else:
    readfile(__DIR__ . '/IMG_0294.jpg');
endif;
