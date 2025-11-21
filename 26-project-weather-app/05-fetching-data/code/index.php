<?php

header('Content-Type: text/plain');

// URL: https://downloads.codingcoursestv.eu/056%20-%20php/weather/weather.php


// Open an encrypted connection to a remote server using SSL (instead of HTTPS) on port 443 w/ a timeout of 30s
$fp = fsockopen("ssl://downloads.codingcoursestv.eu", 443, $errno, $errstr, 30);

// Attempt to connect to the remove server
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    // Provide details on what to access from the remote server & then close the connection when done
    $out = "GET /056%20-%20php/weather/weather.php?" . http_build_query(['city' => 'Los Angeles']) . " HTTP/1.1\r\n";
    $out .= "Host: downloads.codingcoursestv.eu\r\n";
    $out .= "Connection: Close\r\n\r\n";

    // Save the returned data stream into $fp
    fwrite($fp, $out);

    // Storage for returned data
    $response = [];

    // Read data from $fp 
    while (!feof($fp)) {
        // Read 128 bytes from the returned data & save it into the array
        $response[] = fgets($fp, 128);
    }

    // Terminate connection
    fclose($fp);

    // Merge the collected raw data from the API into a string
    $responseStr = implode($response);

    // Explode string to extract the json-formatted data
    $splittedResponse = explode("\r\n\r\n", $responseStr);

    // NOTE: This is a workaround to address change of the author's web server & returned raw data from the API
    // Removes the extra characters at the beginning of the json-formatted data
    $data = substr($splittedResponse[1], 4);

    // Removes the extra characters at the end of the json-formatted data
    $data = substr($data, 0, -3);

    // Decode the JSON data into an array
    var_dump(json_decode($data, true));
}
