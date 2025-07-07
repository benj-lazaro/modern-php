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

            // Open and save the file's contents a variable
            $text = file_get_contents(__DIR__ . '/inc/functions.inc.php');
            // Echo the variable's value to the browser (as HTML code)
            echo $text;

            // Open and immediately output the file's content to the browser (as HTML code)
            readfile(__DIR__ . '/inc/functions.inc.php');

            ?></pre>
</body>

</html>