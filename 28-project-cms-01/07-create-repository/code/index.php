<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of the URL parameter 'page'; otherwise assign "index" (i.e. index.php)
$page = @(string) ($_GET['page'] ?? 'index');

if ($page === "index"):
    // Instantiate Repository "PagesController" to fetch a db record by its "slug" value
    $pagesRepository = new App\Repository\PageRepository($pdo);

    // Instantiate Controller "PagesController" to render the index page
    $pagesController = new App\Frontend\Controller\PagesController($pagesRepository);
    $pagesController->showpage("index");

else:
    // Instantiate Controller "NotFoundController" to render a custom error 404 page
    $notFoundController = new App\Frontend\Controller\NotFoundController();
    $notFoundController->error404();
endif;
