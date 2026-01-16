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
    private PostsRepository $postsRepository;
    private PostsController $postsController;

    public function getPostsRepository(): PostsRepository {
        if (empty($this->postsRepository)):
            $this->postsRepository = new PostsRepository("A", "B");
        endif;
        return $this->postsRepository;
    }

    public function getPostsController(): PostsController {
        if (empty($this->postsController)):
            $postsRepository = $this->getPostsRepository();
            $this->postsController = new PostsController($postsRepository);
        endif;
        return $this->postsController;
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