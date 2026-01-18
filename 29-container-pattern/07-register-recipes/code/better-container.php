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
    public array $recipes = [];

    // Unified instance creation
    public function get($what) {
        // If there is NO active instance of requested Class
        if (empty($this->instances[$what])):

            // Check for the existence of the requested Class' recipe
            if (empty($this->recipes[$what])):
                echo "Could NOT build: {$what}.\n";
                die();
            endif;

            // Access recipe & save the new instance of the requested Class
            $this->instances[$what] = $this->recipes[$what]();
        endif;

        // Returns either the new or current (active) instance
        return $this->instances[$what];
    }
}

// Container pattern instantiated ONLY ONCE
$container = new Container();

// Register recipes of the corresponding Classes
$container->recipes['postsRepository'] = function () {
    return new PostsRepository("A", "B");
};

// To import an instance of a separate Class into the closure of a recipe, use "use()"
$container->recipes['postsController'] = function () use($container) {
    $postRepository = $container->get('postsRepository');
    return new PostsController($postRepository);
};

// Create an instance of PostsRepository
$postsRepository = $container->get('postsRepository');
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get('postsController');
var_dump($postsController);

// Create another instance of PostController; uses the same current (active) instance
$postsController2 = $container->get('postsController');
var_dump($postsController2);

// Deliberate non-existent Class
$postsController3 = $container->get('postsController123');
