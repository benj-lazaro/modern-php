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
    private array $recipes = [];
  
    // Methods
    public function bind(string $what, \Closure $recipe) {
        // Assings (binds) the closure (anonymous function)
        $this->recipes[$what] = $recipe;
    }

    public function get($what) {
        if (empty($this->instances[$what])):

            if (empty($this->recipes[$what])):
                echo "Could not build: {$what}";
                die();
            endif;
            
            // Instantiates an object & then save it as an element of the array "$instances"
            $this->instances[$what] = $this->recipes[$what]();
        endif;

        return $this->instances[$what];
    }
}

// Create an instance of a Container; this is done ONLY ONCE
$container = new Container();

// Binds the recipes that be instantiated from the "Container"
$container->bind("postsRepository", function() { 
    return new PostsRepository("A", "B"); 
});

$container->bind("postsController", function() use($container) {
    $postsRepository = $container->get("postsRepository");
    return new PostsController($postsRepository);
});

// Create an instance of PostsRepository
// $postsRepository = $container->get("postsRepository");
// var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get("postsController");
var_dump($postsController);

// Attemmpt to create an instance of a non-existent Class
$postsController2 = $container->get("abc");
var_dump($postsController2);