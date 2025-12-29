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

    // Constructor
    public function __construct()
    {
        $this->recipes['postsRepository'] = function() {
            return new PostsRepository("A", "B");
        };

        $this->recipes['postsController'] = function() {
            $postsRepository = $this->get("postsRepository");
            return new PostsController($postsRepository);
        };
    }
  
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

$postsRepository = $container->get("postsRepository");
var_dump($postsRepository);

// Create an instance of PostController
$postsController = $container->get("postsController");
var_dump($postsController);

// Intentional non-existent Controller
$postsController2 = $container->get("postsController123");
var_dump($postsController2);