<?php

// Informs the browser that the content is a jpeg image
header("Content-Type: image/jpeg");

// Informs the browser to download the image file using the given filename
header("Content-Disposition: attachment; filename=image.jpg");

header("Content-Length:" . filesize(__DIR__ . '/IMG_0933.jpg'));

// Open the image file in order to download it locally
readfile(__DIR__ . '/IMG_0933.jpg');
