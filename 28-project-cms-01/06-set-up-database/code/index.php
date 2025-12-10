<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of the URL parameter 'page'; otherwise assign "index" (i.e. index.php)
$page = @(string) ($_GET['page'] ?? 'index');

if ($page === "index"):
    // Instantiate PagesController to render the index page
    $pagesController = new App\Frontend\Controller\PagesController();
    $pagesController->showpage('index');

else:
    // Instantiate NotFoundController to render a custom error 404 page
    $notFoundController = new App\Frontend\Controller\NotFoundController();
    $notFoundController->error404();
endif;
