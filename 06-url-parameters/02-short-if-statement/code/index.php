<?php

$name = 'Jan';

// Normal if statement
/*
if ($name === 'Jan') echo "The name is: Jan";
else echo 'The name is not Jan';
*/

// Short if statement
$text = ($name === 'Jan' ? 'The name is: Jan' : 'The name is not Jan');
echo $text . "<br/ >";

$array = [
    'ABC',
    ($name === 'Jan' ? 'The name is: Jan' : 'The name is not Jan')
];
var_dump($array);
