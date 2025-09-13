<?php

function f()
{
    var_dump("Hello");

    // Explicitly return a null
    // return null;
    return;
}

$valueFromFunction = f();
var_dump($valueFromFunction);
var_dump(isset($valueFromFunction));
var_dump(empty($valueFromFunction));
echo "<br />";

$initialValue = null;
var_dump($initialValue);
echo "<br />";

$article = [
    'title' => 'Important News',
    'content' => null,
];

var_dump($article);
