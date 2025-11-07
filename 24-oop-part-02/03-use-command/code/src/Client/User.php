<?php

namespace Client;

use PDO;
use Admin\User as AdminUser;

class User
{

    public function __construct()
    {
        // Two ways of accessing the Class "PDO" outside the Namespace "Client"

        // $pdo = new \PDO(
        //     'mysql:host=localhost;dbname=cities;charset=utf8mb4',
        //     'cities',
        //     'zwkv-HA*L4TaHqI['
        // );

        $pdo = new PDO(
            'mysql:host=localhost;dbname=cities;charset=utf8mb4',
            'cities',
            'zwkv-HA*L4TaHqI['
        );

        // Instantiates an object from the Namespace alias "AdminUser" outside the Namespace "Admin"
        $adminUser = new AdminUser();
    }
}
