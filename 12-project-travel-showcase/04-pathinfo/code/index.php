<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles/simple.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Automatic Image List</h1>
    </header>
    <main>
        <pre><?php
                // Open the sub-directory "images"
                $handle = opendir(__DIR__ . '/images');

                // Array to store image filename(s)
                $images = [];

                // Array for allowed filename extensions
                $allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png"
                ];

                // Efficient way to read files
                while (($currentFile = readdir($handle)) !== false):
                    if ($currentFile === "." || $currentFile === "..") continue;

                    // Get the current file's filename extension
                    $extension = pathinfo($currentFile, PATHINFO_EXTENSION);

                    // Check if the current file's extension is allowed
                    if (!in_array($extension, $allowedExtensions)) continue;

                    // Assign the current image file to the array
                    $images[] = $currentFile;
                endwhile;

                // Close the directory handle
                closedir($handle);
                ?></pre>

        <?php foreach ($images as $image): ?>
            <img src="images/<?php echo rawurlencode($image); ?>" alt="">
        <?php endforeach; ?>

    </main>
</body>

</html>