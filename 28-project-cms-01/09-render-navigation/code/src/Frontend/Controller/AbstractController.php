<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

// Parent Controller
class AbstractController {
    // Constructor
    public function __construct(protected PagesRepository $pagesRepository) { }

    // Method that renders the content to the corresponding View page
    protected function render($view, $params) {
        extract($params);
        ob_start();

        // Get the corresponding View page
        require __DIR__ . '/../../../views/frontend/' . $view . '.view.php';
        $contents = ob_get_clean();

        // Fetch records that will be carried over to the main layout page as navigation bar items
        $navigation = $this->pagesRepository->fetchForNavigation();
    
        // Get the main layout page
        require __DIR__ . '/../../../views/frontend/layouts/main.view.php';
    }

    // Method that renders the custom HTTP error 404 page
    protected function error404() {
        http_response_code(404);

        $this->render('abstract/error404', []);
    }
}