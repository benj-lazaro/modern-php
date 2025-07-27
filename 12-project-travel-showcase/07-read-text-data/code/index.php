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

                $images = [];
                $allowedExtensions = [
                    "jpg",
                    "jpeg",
                    "png"
                ];

                while (($currentFile = readdir($handle)) !== false):
                    if ($currentFile === "." || $currentFile === "..") continue;

                    $extension = pathinfo($currentFile, PATHINFO_EXTENSION);

                    if (!in_array($extension, $allowedExtensions)) continue;

                    // Get the filename without the extension of the image file
                    $fileWithoutExtension = pathinfo($currentFile, PATHINFO_FILENAME);

                    // Prepare the path and filename of the image's corresponding text file
                    $txtFile = __DIR__ . '/images/' . $fileWithoutExtension . ".txt";

                    // Check if such text file exists and acquire its content
                    if (file_exists($txtFile)):
                        $txt = file_get_contents($txtFile);
                    endif;

                    $images[] = [
                        "image" => $currentFile,
                        "title" => "",
                        "content" => "",
                    ];

                endwhile;

                closedir($handle);
                ?></pre>

        <?php foreach ($images as $image): ?>
            <img src="images/<?php echo rawurlencode($image['image']); ?>" alt="">
        <?php endforeach; ?>

    </main>
</body>

</html>