<?php

header("Content-Type: text/plain");

// Convert a human-readable date into a UNIX timestamp
$year = 2025;
$month = 8;
$second = 31;
$day = 26;
$hour = 15;
$minute = 39;
var_dump(mktime($hour, $minute, $second, $month, $day, $year));

// Difference between current and a previous (fixed) UNIX timestamp
$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
var_dump(time() - $timestamp);

// Convert a UNIX timestamp into a human-readable date format
date_default_timezone_set("Asia/Manila");
var_dump(date("Y-m-d", $timestamp));

// Convert a string date into a UNIX timestamp
$strDate = "2023-11-15 15:00:00";
var_dump(strtotime($strDate));
