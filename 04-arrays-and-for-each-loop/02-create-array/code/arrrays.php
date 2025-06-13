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
// Create an array
$categories = array('Programming', 'Business', 'Art & Drawing', 'Self improvment', 'History');
var_dump($categories);
echo "---\n";

// Create an array (alternative)
$subjects = ['Programming', 'Business', 'Art & Drawing', 'Self improvment', 'History'];
var_dump($subjects);
echo "---\n";

// Accessing the individual elements
var_dump($categories[0]);

echo $categories[0] . "\n";
echo $categories[3] . "\n";

$firstCategory = $categories[0];
var_dump($firstCategory);
?>        
    </pre>
</body>

</html>