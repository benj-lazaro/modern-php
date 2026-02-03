<?php

namespace App\Model;

// Model the fetched record(s) from the table "pages" into an object with the following properties
class PageModel {
    public int $id;
    public string $title;
    public string $slug;
    public string $content;
}