<?php

header("Content-Type: text/plain");

class PostsRepository {
    public function __construct(private string $a, private string $b) {}
}

class PostsController {
    public function __construct(private PostsRepository $postsRepository) {}
}

// Container pattern
class Container {
    public function getPostsRepository(): PostsRepository {
        return new PostsRepository("C", "D");
    }

    public function getPostsController(): PostsController {
        // Requires an instance of Class PostsRepository
        $postsRepository = $this->getPostsRepository();
        return new PostsController($postsRepository);
    }
}


// Container pattern instantiated ONLY ONCE
$container = new Container();

// Instantiate a PostsController Object
$postsController = $container->getPostsController();
var_dump($postsController);
