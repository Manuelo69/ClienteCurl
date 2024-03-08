<?php

$animalId = 10;
$url = "http://localhost:8001/rest/{$animalId}/borrar";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error al realizar la solicitud Curl: ' . curl_error($ch);
} else {
    $decodedResponse = json_decode($response, false);
    print($decodedResponse->mensaje);
}
curl_close($ch);