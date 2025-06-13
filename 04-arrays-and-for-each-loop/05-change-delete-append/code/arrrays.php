<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./simple.css" />
    <title>Document</title>
</head>

<body>
    <pre>
<?php
$categories = ['Programming', 'Business', 'Art & Drawing', 'Self improvment', 'History'];
var_dump($categories);

// Change an existing element
$categories[2] = 'Art and Drawing';
var_dump($categories);

// Delete an existing element
unset($categories[4]);
var_dump($categories);

// Add a new element
$categories[] = "Nature";
var_dump($categories);
?>        
    </pre>
</body>

</html>