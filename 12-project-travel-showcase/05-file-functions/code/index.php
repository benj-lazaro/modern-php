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
        <!-- <h1>Automatic Image List</h1> -->
        <h1>Important File Functions</h1>
    </header>
    <main>
        <pre><?php
                // To check for a file (or folder's) existence 
                var_dump(file_exists(__DIR__ . "/images/" . "IMG_0933.jpg"));
                var_dump(file_exists(__DIR__ . "/images/"));
                echo "----- <br />";

                // To check for a normal file
                var_dump(is_file(__DIR__ . "/images/" . "IMG_0933.jpg"));
                var_dump(is_file(__DIR__ . "/images/"));
                echo "----- <br />";

                // To check for a directory
                var_dump(is_dir(__DIR__ . "/images/"));
                echo "----- <br />";

                // To check for a file's size in magebytes
                var_dump(filesize(__DIR__ . "/images/" . "IMG_0933.jpg") / 1024 / 1024);
                echo "----- <br />";

                ?></pre>
    </main>
</body>

</html>