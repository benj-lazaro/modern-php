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
                // Sanitize user-provided input and/or output
                function e($value)
                {
                    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
                }

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

                    // Initialize variables that will store an image's title & content
                    $title = "";
                    $content = [];

                    // Get the filename without the extension of the image file
                    $fileWithoutExtension = pathinfo($currentFile, PATHINFO_FILENAME);

                    // Prepare the path and filename of the image's corresponding text file
                    $txtFile = __DIR__ . '/images/' . $fileWithoutExtension . ".txt";

                    // Check if such text file exists and acquire its content
                    if (file_exists($txtFile)):
                        $txt = file_get_contents($txtFile);

                        // Explode the content based on the "\n" & stored as an array
                        $info = explode("\n", $txt);

                        // Assign 1st array element of the exploded string into a variable (i.e. title)
                        $title = $info[0];

                        // Unset (remove) 1st element from the array, keeping the rest intact
                        unset($info[0]);

                        // Assign the remaining array elements into a variable (i.e. content)
                        $content = array_values($info);

                    endif;

                    $images[] = [
                        "image" => $currentFile,
                        "title" => $title,
                        "content" => $content,
                    ];

                endwhile;

                closedir($handle);
                ?></pre>

        <?php foreach ($images as $image): ?>
            <figure>
                <h2><?php echo e($image['title']); ?></h2>
                <img src="images/<?php echo rawurlencode($image['image']); ?>" alt="">
                <figcaption>
                    <?php foreach ($image['content'] as $contentParagraph): ?>
                        <p><?php echo e($contentParagraph); ?></p>
                    <?php endforeach; ?>
                </figcaption>
            </figure>
        <?php endforeach; ?>

    </main>
</body>

</html>