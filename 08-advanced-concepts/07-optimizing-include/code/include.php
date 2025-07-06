<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <pre><?php
            // Magic Constants

            include "inc/a.php";

            // __DIR__ = directory name where the corresponding PHP file is currently located
            var_dump(__DIR__ . '/inc/a.php');

            // Returns the directory name ONLY of this PHP file
            var_dump(dirname(__FILE__));

            // Include the directory of this PHP file
            // Append the string of a sub-directory & file
            include dirname(__FILE__) . '/inc/a.php';


            include __DIR__ . '/inc/a.php';

            ?></pre>
</body>

</html>