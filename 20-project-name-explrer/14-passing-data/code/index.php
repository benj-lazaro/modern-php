<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function render($view, $params)
{
    // Iterate through the Associative aray
    // foreach ($params as $key => $value):
    //     // Dynamically create a variable & assign its corresponding value
    //     ${$key} = $value;
    // endforeach;

    // Better to use extract() instead
    extract($params);

    // Enable output buffering
    ob_start();

    // Capture the generated output from this file
    require __DIR__ . '/views/pages/' . $view . '.php';

    // Save the content and then clean output buffer
    $contents = ob_get_clean();

    // Require the file responsible for page's layout
    require __DIR__ . '/views/layouts/main.view.php';
}

$name = "Lauren";

render("index.view", [
    'name' => $name,
    'sum' => 12345,
]);
