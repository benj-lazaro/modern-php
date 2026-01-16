<?php

header("Content-Type: text/plain");

class PostsRepository {
    public function __construct(private string $a, private string $b) {
        var_dump("PostsRespository instantiated...");
    }
}

class PostsController {
    public function __construct(private PostsRepository $postsRepository) {
        var_dump("PostsController instantiated...");
    }
}

// Container pattern
class Container {
    private array $instances = [];

    // Unified instance creation
    public function get($what) {
        if ($what === 'postsRepository'):

            // Save new instance as element of the array
            if (empty($this->instances['postsRepository'])):
                $this->instances['postsRepository'] = new PostsRepository("A", "B");
            endif;
            // Otherwise, return the current (active) instance instead
            return $this->instances['postsRepository'];

        elseif($what === 'postsController'):

            // Save new instance as element of the array
            if (empty($this->instances['postsController'])):
                $postsRepository = $this->get('postsRepository');
                $this->instances['postsController'] = new PostsController($postsRepository);
            endif;
            // Otherwise, return the current (active) instance instead
            return $this->instances['postsController'];

        endif;
    }
}

// Container pattern instantiated ONLY ONCE
$container = new Container();

// Create an instance of PostsRepository
$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get('postsController');
var_dump($postsController);

// Create another instance of PostController; uses the same current (active) instance
$postsController2 = $container->get('postsController');
var_dump($postsController2);