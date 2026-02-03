<?php

namespace App\Frontend\Controller;

// Child Controller that handles non-existent pages
class NotFoundController extends AbstractController {

    // Overrides the inherited protected Method
    // Makes it publicly available only for instances of this Child Controller
    public function error404()
    {
        parent::error404();
    }
}