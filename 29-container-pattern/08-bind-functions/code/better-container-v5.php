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
    // Stores active Class instances
    private array $instances = [];

    // Stores anonymous functions for creating Class instances
    public array $recipes = [];

    // Create an instance if it doesn't exists using the corresponding recipe, otherwise re-use the current one
    public function get($what) {
        if (empty($this->instances[$what])):
            
            // Terminate if the recipe doesn't exists
            if (empty($this->recipes[$what])):
                echo "Could not bulid: {$what}.\n";
                die();
            endif;

            $this->instances[$what] = $this->recipes[$what]();

        endif;
        return $this->instances[$what];
    }
}

$container = new Container();

// Loads anonymous functions into the recipes array
$container->recipes["postsRepository"] = function() {
    return new PostsRepository("1st arg value", "2nd arg value");
};

$container->recipes["postsController"] = function() use($container) {
    $postsRepository = $container->get("postsRepository");
    return new PostsController($postsRepository);
};

// Objects created shares a single instance of their corresponding Classes
$postsRepository = $container->get("postsRepository");
var_dump($postsRepository);

$postsController1 = $container->get("postsController");
var_dump($postsController1);

$postsController2 = $container->get("postsController");
var_dump($postsController2);

$noneExistentController = $container->get("postsController123");