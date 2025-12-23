<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of URL parameter "route"; if none, assign the value of "pages"
$route = @(string) ($_GET['route'] ?? 'pages');

// Check which Controller to render
if ($route === "pages"):
    // Fetch the value of URL parameter "page"
    $page = @(string) ($_GET['page'] ?? 'index');

    // Fetch the corresponding record from the database
    $pagesRepository = new App\Repository\PagesRepository($pdo);
    $pagesRepository->fetchBySlug("index");

    // Render the record on the corresponding View Page
    $pagesController = new App\Frontend\Controller\PagesController($pagesRepository);
    $pagesController->showPage($page);

else:
    $pagesRepository = new App\Repository\PagesRepository($pdo);

    // Render the error page for non-existent record 
    $notFoundController = new App\Frontend\Controller\NotFoundController($pagesRepository);
    $notFoundController->error404();    
endif;
