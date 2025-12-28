<?php

header("Content-Type: text/plain");

// Class(es) with dependencies
class PostsRepository {
    // Constructor
    public function __construct(private string $a, private string $b) {
        var_dump("PostsRepository has been constructed...");
    }
}

class PostsController {
    // Constructor
    public function __construct(private PostsRepository $postsRepository) {}
}

// Container pattern
class Container {
    // Properties
    private array $instances = [];
  
    // Methods
    public function get($what) {
        if ($what === "postsRepository"):
            if (empty($this->instances['postsRepository'])):
                $this->instances['postsRepository'] = new PostsRepository("A", "B");
            endif;
            
            return $this->instances['postsRepository'];
        elseif ($what === "postsController"):
            if (empty($this->instances['postsController'])):
                $postsRepository = $this->get("postsRepository");
                $this->instances['postsController'] = new PostsController($postsRepository);
            endif;

            return $this->instances['postsController'];
        endif;
    }
}

// Create an instance of a Container; this is done ONLY ONCE
$container = new Container();

$postsRepository = $container->get("postsRepository");
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get("postsController");
var_dump($postsController);

$postsController2 = $container->get("postsController");
var_dump($postsController2);