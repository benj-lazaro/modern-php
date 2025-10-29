<?php

// phpinfo();

// Generate a hashed string of the plaintext password
var_dump(password_hash('password', PASSWORD_BCRYPT));

// Get the full path of the project's root folder
var_dump(__DIR__);
