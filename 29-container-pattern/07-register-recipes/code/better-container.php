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
    public array $recipes = [];
  
    // Methods
    public function get($what) {
        if (empty($this->instances[$what])):
            if (empty($this->recipes[$what])):
                echo "Could not build: {$what}";
                die();
            endif;
            
            $this->instances[$what] = $this->recipes[$what]();
        endif;

        return $this->instances[$what];
    }
}

// Create an instance of a Container; this is done ONLY ONCE
$container = new Container();

// Access the Property "recipes" to create Class instances using a single Method "get()"
$container->recipes['postsRepository'] = function() {
    return new PostsRepository("A", "B");
};

$container->recipes['postsController'] = function() use($container) {
    $postsRepository = $container->get("postsRepository");
    return new PostsController($postsRepository);
};

$postsRepository = $container->get("postsRepository");
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get("postsController");
var_dump($postsController);

// Intentional non-existent Controller
$postsController2 = $container->get("postsController123");
var_dump($postsController2);