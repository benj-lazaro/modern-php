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
    // Stores current instance(s); instead of Private properties assigned w/ their respective instances
    private array $instances = [];
    
    // Methods that creates a new instance if it doesn't exists, otherwise re-use current one
    public function getPostsRepository(): PostsRepository {
        if (empty($this->instances["postsRepository"])):
            $this->instances["postsRepository"] = new PostsRepository("1st arg value", "2nd arg value");
        endif;
        return $this->instances["postsRepository"];
    }

    public function getPostsController(): PostsController {
        if (empty($this->instances["postsController"])):
            $postsRespository = $this->getPostsRepository();
            $this->instances["postsController"] = new PostsController($postsRespository);
        endif;
        return $this->instances["postsController"];
        
    }
}

$container = new Container();

$postsRepository = $container->getPostsRepository();
var_dump($postsRepository);

$postsController1 = $container->getPostsController();
var_dump($postsController1);

$postsController2 = $container->getPostsController();
var_dump($postsController2);