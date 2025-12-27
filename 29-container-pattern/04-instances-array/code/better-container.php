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
    private PostsRepository $postsRepository;
    private PostsController $postsController;
    
    // Methods
    public function getPostsRepository(): PostsRepository {
        if (empty($this->instances['postsRepository'])):
            // Create a new instance
            $this->instances['postsRepository'] = new PostsRepository("A", "B");
        endif;

        // Otherwise, return the current instance instead
        return $this->instances['postsRepository'];
        
    }

    public function getPostsController(): PostsController {        
        if (empty($this->instances['postsController'])):
            // Create a new instance
            $postsRepository = $this->getPostsRepository();
            $this->instances['postsController'] = new PostsController($postsRepository);
        endif;

        // Otherwise, return the current instance instead   
        return $this->instances['postsController'];
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