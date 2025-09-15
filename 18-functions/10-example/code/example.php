<?php

header("Content-Type: text/plain");

function format_filesize($size)
{
    // Bytes
    if ($size < 1042):
        $size = round($size, 2);
        return "{$size} bytes";
    endif;

    // Kilobytes
    $size = $size / 1024;
    if ($size < 1042):
        $size = round($size, 2);
        return "{$size} kB";
    endif;

    // Megabyte
    $size = $size / 1024;
    if ($size < 1042):
        $size = round($size, 2);
        return "{$size} MB";
    endif;

    // Gigabyte
    $size = $size / 1024;
    if ($size < 1042):
        $size = round($size, 2);
        return "{$size} GB";
    endif;
}

// var_dump(format_filesize(50));
// var_dump(format_filesize(1500));
// var_dump(format_filesize(1500000));

// Retrieve, format & display the size of the targeted file
$size = filesize(__DIR__ . '/08-cat.jpg');
var_dump(format_filesize($size));
