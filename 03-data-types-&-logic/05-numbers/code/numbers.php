<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="simple.css" />
  <title>Document</title>
</head>

<body>
  <pre>
<?php
$secretNumber = 47;

// Evaluate each numeric expression then convert it into a string
echo ($secretNumber + 2) . "\n";
echo ($secretNumber - 2) . "\n";
echo ($secretNumber * 2) . "\n";
echo ($secretNumber / 2) . "\n";

// Evaluates two number "strings" then return a result 
echo '5' + '6' . "\n";
// echo '5' + 'a6';

// Round a float to a single digit
echo round(3.33, 1) . "\n";

// Mathematical operation shortcut
$newValue = 2;
echo $newValue . "\n";;

$newValue += 2;
echo $newValue . "\n";;

?>
    </pre>
</body>

</html>