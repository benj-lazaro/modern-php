<?php
// var_dump($_POST);
var_dump($_FILES);
var_dump(__DIR__ . '/' . $_FILES['image']['name']);

// Check if a file has been submitted
if (!empty($_FILES) && !empty($_FILES['image'])):
    if ($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0):
        // Clean up the filename (w/o extension) of the image file
        $nameWithoutExtension = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME);
        $name = preg_replace('/[^a-zA-Z0-9]/', '', $nameWithoutExtension);

        // Change the filename & scale down the submitted image file
        $originalImage = $_FILES['image']['tmp_name'];
        $destinationImage = __DIR__ . '/' . $name . '-' . time() . '.jpg';

        // Get the submitted image file's width & height
        [$width, $height] = getimagesize($originalImage);

        // Define the scaled-down width & height
        $maxDimension = 400;
        $scaleFactor = $maxDimension / max($width, $height);;

        $newWidth = $width * $scaleFactor;
        $newHeight = $height * $scaleFactor;

        // Open the submitted image file
        $sourceImage = imagecreatefromjpeg($originalImage);

        // Create a new image file
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Copy the submitted file and scale it down 
        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Save the new image on the application's local filesystem
        imagejpeg($newImage, $destinationImage);
    endif;
endif;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="index.php" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="submit" value="Submit!">
    </form>
</body>

</html>