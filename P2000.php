<?php

/**
 *  Sending each line with the Guzzle HTTP Method towards the requested API.
 *
 * (C) by Jasper Stolwijk. Using MIT license.
 * MIT License: https://github.com/JSTLWK-DEV/P2000-to-API/blob/master/LICENSE
 *
 */

require __DIR__ . '/vendor/autoload.php';

$arguments = $_SERVER['argv'];
$handle    = popen('sudo rtl_fm -f 169.65M -M fm -s 22050 -p 25 | multimon-ng -a FLEX -t raw /dev/stdin', 'r');
$client    = new GuzzleHttp\Client();

echo $arguments[1];

while(!feof($handle)) {
  $read = fread($handle, 2096);
  $data = [
    'message' => $read
  ];
  try {
    $client->request('POST', $arguments[1], $data);
  } catch (\GuzzleHttp\Exception\GuzzleException $e) {
    echo "\e[101m Error: ".$e->getMessage() . "\e[49m";
  }

}

pclose($handle);