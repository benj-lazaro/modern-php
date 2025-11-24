<?php

namespace App\Weather;

class RemoteWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): ?WeatherInfo
    {
        $fp = @fsockopen("ssl://downloads.codingcoursestv.eu", 443, $errno, $errstr, 30);

        if (!$fp) {
            // echo "$errstr ($errno)<br />\n";
            return null;
        } else {
            $out = "GET /056%20-%20php/weather/weather.php?" . http_build_query(['city' => $city]) . " HTTP/1.1\r\n";
            $out .= "Host: downloads.codingcoursestv.eu\r\n";
            $out .= "Connection: Close\r\n\r\n";

            fwrite($fp, $out);

            $response = [];

            while (!feof($fp)) {
                $response[] = fgets($fp, 128);
            }

            fclose($fp);

            $responseStr = implode($response);
            $splittedResponse = explode("\r\n\r\n", $responseStr);

            // In the event that the returned weather data is empty
            if (empty($splittedResponse)):
                return null;
            endif;

            $data = substr($splittedResponse[1], 4);
            $data = substr($data, 0, -3);

            $weatherData = json_decode($data, true);

            // In the event that the returned weather data lacks the needed properties
            if (empty($weatherData['city']) || empty($weatherData['temperature']) || empty($weatherData['weather'])):
                return null;
            endif;

            return new WeatherInfo($weatherData['city'], $weatherData['temperature'], $weatherData['weather']);
        }
    }
}
