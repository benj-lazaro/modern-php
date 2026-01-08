<?php

header("Content-Type: text/plain");

class PostsRepository {
    public function __construct(public string $a, public string $b) {
        var_dump("PostRepository instantiated...");
    }
}

class PostsController {
    public function __construct(private PostsRepository $postRespository) {
        var_dump("PostsController instantiated...");
    }
}

// Manage instances of Classes
class Container {
    private PostsRepository $postsRepository;
    private PostsController $postsController;

    // Methods that creates a new instance if it doesn't exists, otherwise re-use current one
    public function getPostsRepository(): PostsRepository {
        if (empty($this->postsRepository)):
            $this->postsRepository = new PostsRepository("1st arg value", "2nd arg value");
        endif;
        return $this->postsRepository;
    }

    public function getPostsController(): PostsController {
        if (empty($this->postsController)):
            $postsRespository = $this->postsRepository;
            $this->postsController = new PostsController($postsRespository);
        endif;
        return $this->postsController;
        
    }
}

$container = new Container();

$postsRepository = $container->getPostsRepository();
var_dump($postsRepository);

$postsController1 = $container->getPostsController();
var_dump($postsController1);

$postsController2 = $container->getPostsController();
var_dump($postsController2);