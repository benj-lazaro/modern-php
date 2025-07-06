<?php

var_dump("I'm the inc/a.php file");

// Includes the neighboring b.php
// NOT the file of the same filename located in the project's root directory
include __DIR__ . '/b.php';
