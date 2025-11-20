<?php

// use App\Weather\FakeWeatherFetcher;
use App\Weather\RandomWeatherFetcher;

require __DIR__ . "/inc/all.inc.php";

// Fetch weather data from a 'fake' API
// $fetcher = new FakeWeatherFetcher();
$fetcher = new RandomWeatherFetcher();

// Stores data into $info
$info = $fetcher->fetch("New York City");

// Render the content into the View
require __DIR__ . "/views/index.view.php";
