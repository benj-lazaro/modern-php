<?php

// Retrieve details of a selected image file
$imageDimensions = getimagesize(__DIR__ . '/galaxyclass.jpg');
$width = $imageDimensions[0];
$height = $imageDimensions[1];
$channels = $imageDimensions['channels'];
$type = $imageDimensions['mime'];

// echo "The selected file has a dimensions of $width x $height, has $channels channels and of type '$type' .";
// echo "<br />";

// var_dump($imageDimensions);
// echo "<br />";

// Special syntax of unpacking key elements from the returned array into individual variables
[$imageWidth, $imageHeight] = getimagesize(__DIR__ . '/galaxyclass.jpg');

// Accessing named keys from the returned array
$imageChannels = getimagesize(__DIR__ . '/galaxyclass.jpg')['channels'];
$imageType = getimagesize(__DIR__ . '/galaxyclass.jpg')['mime'];

// echo "The selected file has a dimensions of $imageWidth x $imageHeight, has $imageChannels channels and of type '$imageType' .";
// echo "<br />";

// Set the preferred maximum width
$maxDimension = 400;

// Determine the scale factor
$maxValue = max($width, $height);
$scaleFactor = $maxDimension / $maxValue;

// Calculate the new width & height
$newWidth = $width * $scaleFactor;
$newHeight = $height * $scaleFactor;


// Scale down the (source) image file
$sourceImage = imagecreatefromjpeg(__DIR__ . '/galaxyclass.jpg');

// State the dimension of the new image
$newImage = imagecreatetruecolor($newWidth, $newHeight);

// Copies & scales down the source image with resampling, implementing changes to the new image
imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

// Render the resized image on the browser window
// header("Content-Type: image/jpeg");
// imagejpeg($newImage);

// Save the resized image on the local filesystem
imagejpeg($newImage, 'image_scaled.jpg');
