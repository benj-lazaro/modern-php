<?php

namespace App\Frontend\Controller;

use App\Repository\PageRepository;

class PagesController extends AbstractController
{
    // Controller
    public function __construct(private PageRepository $pagesRepository) {}


    public function showPage($pageKey)
    {
        $page = $this->pagesRepository->fetchBySlug($pageKey);

        if (empty($page)):
            $this->error404();
            return;
        endif;

        $this->render('pages/showPage', [
            'page' => $page
        ]);
    }
}
