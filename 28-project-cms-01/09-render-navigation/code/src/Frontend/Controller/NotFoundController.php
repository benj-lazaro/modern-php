<?php

namespace App\Frontend\Controller;

class NotFoundController extends AbstractController
{
    // Opens the inherited Method for public use
    public function error404()
    {
        return parent::error404();
    }
}
