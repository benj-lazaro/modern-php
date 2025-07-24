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

                // Read the first file
                // $currentFile = readdir($handle);

                // Read the rest of the files from the $handle
                // while ($currentFile !== false):
                //     var_dump($currentFile);
                //     $currentFile = readdir($handle);
                // endwhile;

                // Array to store image filename(s)
                $images = [];

                // Efficient way to read files
                while (($currentFile = readdir($handle)) !== false):
                    if ($currentFile === "." || $currentFile === "..") continue;

                    // var_dump($currentFile);
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