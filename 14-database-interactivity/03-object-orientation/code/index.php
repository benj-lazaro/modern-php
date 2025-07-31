<?php

// Instantiate a new object from the class ZipArchive
$zip = new ZipArchive();

// Open a local Zip archive
$zip->open(__DIR__ . "/archive.zip");

// Count the number of files inside the active Zip archive
$numFiles = $zip->count();
echo "There are currently $numFiles files in the Zip archive <br /> <br /> ";

// List the files inside the Zip archive
for ($i = 0; $i < $numFiles; $i++):
    $fileEntry = $zip->getNameIndex($i);
    echo "Filename: $fileEntry <br />";
endfor;

// Get the content from a file within a Zip archive
$fileContent = $zip->getFromName("message.txt");
echo "The content of message.txt: $fileContent <br />";

// Close the active Zip archive
$zip->close();
