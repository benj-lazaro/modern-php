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
            // If the URL parameter 'name' does NOT exist or returns a non-NULL value
            // An empty string is returned instead
            // Type cast the returned value as string
            // Supress any warning returned by a non-string value (e.g. array)
            $name = @(string) ($_GET['name'] ?? '');

            var_dump($name);
            ?></pre>

    <a href="types.php?<?php echo http_build_query(['name' => ['John', 'Thomas']]); ?>">Link</a>
</body>

</html>