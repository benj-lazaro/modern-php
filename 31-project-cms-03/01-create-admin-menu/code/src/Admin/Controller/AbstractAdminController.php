<?php

namespace App\Admin\Controller;

// Parent Controller
abstract class AbstractAdminController {
    // Constructor
    public function __construct() { }

    // Method that renders the content to the corresponding View page
    protected function render($view, $params) {
        extract($params);
        ob_start();

        // Get the corresponding View page
        require __DIR__ . '/../../../views/admin/' . $view . '.view.php';
        $contents = ob_get_clean();
    
        // Get the main layout page
        require __DIR__ . '/../../../views/admin/layouts/main.view.php';
    }

    // Method that renders the custom HTTP error 404 page
    protected function error404() {
        http_response_code(404);

        $this->render('abstract/error404', []);
    }
}

