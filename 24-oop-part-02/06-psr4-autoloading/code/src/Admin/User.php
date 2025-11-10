<?php

namespace App\Admin;

class User
{
    // Property

    // public Role $role;
    public Role $role;

    // Constructor
    public function __construct()
    {
        // Instantiates an Object from the Class "Role"
        $this->role = new Role();
    }
}
