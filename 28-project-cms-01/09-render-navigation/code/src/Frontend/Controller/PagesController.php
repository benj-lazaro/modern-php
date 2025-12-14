<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

class PagesController extends AbstractController {

    // Constructor
    public function __construct(PagesRepository $pagesRepository) {
        // Turn pagesRespository into a protected property
        parent::__construct($pagesRepository);
    }

    // Method(s)
    public function showPage($pageKey) {
        $page = $this->pagesRepository->fetchBySlug($pageKey);

        if (empty($page)) {
            $this->error404();
            return;
        }

        $this->render('pages/showPage', [
            'page' => $page
        ]);
    }
}
