<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

// Child Controller that handles the rendering of the requested View page
class PagesController extends AbstractController {

    // Constructor
    public function __construct(PagesRepository $pagesRepository) {
        parent::__construct($pagesRepository);
    }

    // Method that renders the correspodning View page based on the value in "$pageKey"
    public function showPage(string $pageKey) {
        $page = $this->pagesRepository->fetchBySlug($pageKey);

        if (empty($page)):
            $this->error404();
            return;
        endif;

        // Render the fetched PageModel object into the correspodning View page "showPage"
        $this->render("pages/showPage", ['page' => $page]);
    }

}
