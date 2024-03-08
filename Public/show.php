<?php

$animal = 'bisonte';
$id = 1;
$ch = curl_init("http://localhost:8001/api/productos/{$id}");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch))
    echo curl_errno($ch);
else {
    $decoded = json_decode($response, false);
    foreach ($decoded->data as $producto) {
        echo $producto;
    }
}
curl_close($ch);