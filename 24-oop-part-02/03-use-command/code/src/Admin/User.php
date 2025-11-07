<?php

namespace Admin;

class User
{
    // Property

    // public Role $role;
    public \Admin\Role $role;

    // Constructor
    public function __construct()
    {
        // Instantiates an Object from the Class "Role"
        $this->role = new Role();
    }
}
