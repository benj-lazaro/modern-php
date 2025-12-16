<?php

header("Content-Type: text/plain");

// Class(es) with dependencies
class PostsRepository {
    // Constructor
    public function __construct(private string $a, private string $b) {}
}

class PostsController {
    // Constructor
    public function __construct(private PostsRepository $postsRepository) {}
}

// Every instance of PostsRepository requires passing dependencies (i.e. arguments)
// Every instance of PostsController requires a PostsRepository object as argument
// These steps are repeated throughout the codebase whenever a instance of PostController is required
// Changes on either Classes requires implementing changes throughout the codebase

// $postsRepository = new PostsRepository("A", "B");
// $postsController = new PostsController($postsRepository);

// Container pattern
class Container {
    // Methods
    public function getPostsRepository(): PostsRepository {
        return new PostsRepository("C", "D");
    }

    public function getPostsController(): PostsController {
        $postsRepository = $this->getPostsRepository();
        return new PostsController($postsRepository);
    }
}

// Container is created ONE TIME ONLY
$container = new Container();

// Every since of PostsController ONLY requires this line of code
$postsController = $container->getPostsController();

var_dump($postsController);
