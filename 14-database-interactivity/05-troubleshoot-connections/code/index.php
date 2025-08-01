<?php

// Access 'note_app' database using given credentials; flag for a fatal error
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

var_dump($pdo);
