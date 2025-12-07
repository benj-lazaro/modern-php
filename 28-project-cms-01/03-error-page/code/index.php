<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of the URL parameter 'page'; otherwise assign "index" (i.e. index.php)
$page = @(string) ($_GET['page'] ?? 'index');

if ($page === "index"):
    echo "TODO: Implement the index page <br />";
else:
    // Instantiate the Controller & then call the Method "error404()"
    $notFoundController = new App\Frontend\Controller\NotFoundController();
    $notFoundController->error404();
endif;
