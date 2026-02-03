<?php

namespace App\Support;

// Container pattern
class Container {
    private array $instances = [];
    private array $recipes = [];

    // Binds (registers) a recipe to its corresponding Class
    public function bind(string $what, \Closure $recipe) {
        $this->recipes[$what] = $recipe;
    }

    // Unified instance creation
    public function get($what) {
        // If there is NO active instance of requested Class
        if (empty($this->instances[$what])):

            // Check for the existence of the requested Class' recipe
            if (empty($this->recipes[$what])):
                echo "Could NOT build: {$what}.\n";
                die();
            endif;

            // Access recipe to create & save the new instance of the requested Class
            $this->instances[$what] = $this->recipes[$what]();
        endif;

        // Returns either the new or current (active) instance
        return $this->instances[$what];
    }
}
