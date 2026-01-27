<?php

require __DIR__ . '/inc/all.inc.php';

// Create a new instance of the Container
$container = new App\Support\Container();

// Register the recipe of the corresponding Class
$container->bind("pdo", function () {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$container->bind("pagesRepository", function () use ($container){
    $pdo = $container->get("pdo");
    return new App\Repository\PagesRepository($pdo);
});

$container->bind("pagesController", function () use ($container) {
    $pagesRepository = $container->get("pagesRepository");
    return new App\Frontend\Controller\PagesController($pagesRepository);
});

$container->bind("notFoundController", function() use($container) {
    $pagesRepository = $container->get("pagesRepository");
    return new App\Frontend\Controller\NotFoundController($pagesRepository);
});

// Fetch the value of URL parameter "route"; if none, assign the value of "pages"
$route = @(string) ($_GET['route'] ?? 'pages');

// Check which Controller to render
if ($route === "pages"):
    // Fetch the value of URL parameter "page"
    $page = @(string) ($_GET['page'] ?? 'index');

    $pagesController = $container->get("pagesController");
    $pagesController->showPage($page);

else:
    // Render the error page for a non-existent recipe
    $notFoundController = $container->get("notFoundController");
    $notFoundController->error404();    
endif;
