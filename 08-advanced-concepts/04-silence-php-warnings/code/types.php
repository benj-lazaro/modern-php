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

            if (isset($_GET['price'])) {
                // Type cast the parameter value to be of type 'int'
                $price = (int) $_GET['price'];
                var_dump($price);

                var_dump($price * 1.19);
            }

            if (isset($_GET['name'])):
                // Supress warning
                $name = @(string) $_GET['name'];

                var_dump($name . '!!!');

            // Fatal error is NOT supressed
            // @nonexists();

            endif;

            ?></pre>

    <a href="types.php?<?php echo http_build_query(['name' => ['John', 'Thomas']]); ?>">Link</a>
</body>

</html>