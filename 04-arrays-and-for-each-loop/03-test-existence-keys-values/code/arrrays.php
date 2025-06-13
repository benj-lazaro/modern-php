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

// Test for the existence of a key in the array
var_dump(isset($categories[99]));   // Returns false; the 99th element is NOT set to a value
var_dump(empty($categories[99]));   // Retrue true; the 99th element is empty
echo "----\n";

// Test for the existence of a value in an array
var_dump((in_array('Programming', $categories)));
var_dump((in_array('Hacking', $categories)));

if (in_array('Programming', $categories)) {
    echo "The category Programming is available from the system.\n";
}
echo "----\n";

// Count the number of elements in an array
$elementCount = count($categories);
echo "There are {$elementCount} elements found in the array 'categories'\n";

?>        
    </pre>
</body>

</html>