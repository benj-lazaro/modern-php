<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

abstract class AbstractController
{
    // Contruct
    public function __construct(protected PagesRepository $pagesRepository) {}

    // Method(s)
    protected function render($view, $params)
    {   
        extract($params);

        ob_start();
        require __DIR__ . '/../../../views/frontend/' . $view . '.view.php';
        $contents = ob_get_clean();
        
        // Fetch database records, store it & made it available to the main layout page
        $navigation = $this->pagesRepository->fetchForNavigation();
        require __DIR__ . '/../../../views/frontend/layouts/main.view.php';
    }

    protected function error404()
    {
        http_response_code(404);
        $this->render('abstract/error404', []);
    }
}
