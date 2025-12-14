<?php

require __DIR__ . '/inc/all.inc.php';

// Declare an additional URL parameter; if none found, default value to "pages"
$route = @(string) ($_GET['route'] ?? 'pages');

// Route "pages"
if ($route === "pages"):
    // Fetch the URL parameter 'page', if none found, default to "index" (i.e. index.php)
    $page = @(string) ($_GET['page'] ?? 'index');

    // Fetch a database record by its "slug" value
    $pagesRepository = new App\Repository\PagesRepository($pdo);

    // Render the corresponding View page
    $pagesController = new \App\Frontend\Controller\PagesController($pagesRepository);
    $pagesController->showpage($page);

else:
    $pagesRepository = new App\Repository\PagesRepository($pdo);
    
    // Render a custom error 404 page
    $notFoundController = new \App\Frontend\Controller\NotFoundController($pagesRepository);
    $notFoundController->error404();
endif;
