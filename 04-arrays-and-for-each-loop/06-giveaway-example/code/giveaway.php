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
// Name of paid subscribers
$names = [
    'Emily Johnson',
    'Michael Smith',
    'Sarah Williams',
    'James Brown',
    'Jennifer Davis',
    'William Miller',
];

// Get total number of subscribers
$totalSubscribers = count($names);

// Randomly pick the lucky one
$luckyOne = rand(0, $totalSubscribers - 1);
echo "The lucky subscriber is {$names[$luckyOne]}!!!";
// echo "The lucky subscriber is {$names[rand(0,$totalSubscribers - 1)]}!!!"

?>        
    </pre>
</body>

</html>