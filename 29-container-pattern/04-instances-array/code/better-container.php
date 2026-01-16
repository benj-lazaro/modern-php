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
    // private PostsRepository $postsRepository;
    // private PostsController $postsController;
    
    public function getPostsRepository(): PostsRepository {
        // Checks if there is an active instance of PostsRepository in the array
        if (empty($this->instances['postRepository'])):
            $this->instances['postsRepository'] = new PostsRepository("A", "B");
        endif;
        return $this->instances['postsRepository'];
    }

    public function getPostsController(): PostsController {
        // Check if there is an active instance of PostsController in the array
        if (empty($this->instances['postsController'])):
            // Calls dependency
            $postsRepository = $this->getPostsRepository();
            $this->instances['postsController'] = new PostsController($postsRepository);
        endif;
        return $this->instances['postsController'];
    }
}


// Container pattern instantiated ONLY ONCE
$container = new Container();

// Create an instance of PostsRepository
$postsRepository = $container->getPostsRepository();
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->getPostsController();
var_dump($postsController);

// Create another instance of PostController; uses the same current (active) instance
$postsController2 = $container->getPostsController();
var_dump($postsController2);