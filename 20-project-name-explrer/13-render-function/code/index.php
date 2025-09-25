<?php

function render($view)
{
    // Enable output buffering
    ob_start();

    // Capture the generated output from this file
    require __DIR__ . '/views/pages/' . $view . '.php';

    // Save the content and then clean output buffer
    $contents = ob_get_clean();

    // Require the file responsible for page's layout
    require __DIR__ . '/views/layouts/main.view.php';
}

render("index.view");
