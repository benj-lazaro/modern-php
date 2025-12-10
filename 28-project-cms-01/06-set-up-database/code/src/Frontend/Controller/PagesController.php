<?php

namespace App\Frontend\Controller;

class PagesController extends AbstractController
{
    public function showPage($pageKey)
    {
        // TODO: Fetch (and render) the actual page
        //echo "PageController renders the page: {$pageKey}";

        $this->render('pages/showPage', []);
    }
}
