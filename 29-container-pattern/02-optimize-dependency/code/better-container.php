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
    private PostsRepository $postsRepository;
    private PostsController $postsController;

    // Methods
    public function getPostsRepository(): PostsRepository {
        // Create a new instance if there is none
        if (empty($this->postsRepository)):
            $this->postsRepository = new PostsRepository("A", "B");
        endif;

        // Otherwise, return the current instance instead
        return $this->postsRepository;
        
    }

    public function getPostsController(): PostsController {        
        // Create a new instance if there is none
        if (empty($this->postsController)):
            $postsRepository = $this->getPostsRepository();
            $this->postsController = new PostsController($postsRepository);
        endif;

        // Otherwise, return the current instance instead   
        return $this->postsController;
    }
}

// Create an instance of a Container; this is done ONLY ONCE
$container = new Container();

// Create an instance of PostsRepository
$postsRepository = $container->getPostsRepository();
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->getPostsController();
var_dump($postsController);

// Create another instance of PostController
$postsController2 = $container->getPostsController();
var_dump($postsController2);