<?php

// allows for CORS work around, prevents spam access to API
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// set token api found at this webiste https://superheroapi.com/
$token = 'input-token-here';

// this is a hard coded id value for superman
$id = $_GET['id'] ?? '644';
$url = "https://superheroapi.com/api/$token/$id/biography";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// not safe for production to leave disabled
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// mimics web browser to allow work around with CORS
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/json',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode([
        'response' => 'error',
        'error' => curl_error($ch)
    ]);
} else {
    echo $response;
}

curl_close($ch);