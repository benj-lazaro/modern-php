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

                // Dumps the corresponding directory handle
                var_dump($handle);

                echo "----- <br />";

                // Reads the resources from the directory handle
                var_dump(readdir($handle));
                var_dump(readdir($handle));
                var_dump(readdir($handle));
                var_dump(readdir($handle));
                var_dump(readdir($handle));
                var_dump(readdir($handle));
                var_dump(readdir($handle));

                // Close the directory handle
                closedir($handle);
                ?></pre>
    </main>
</body>

</html>