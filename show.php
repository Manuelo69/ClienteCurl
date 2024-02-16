<?php

$ch = curl_init("http://127.0.0.1:8000/rest/bisonte");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch))
    echo curl_errno($ch);
else
    $decoded = json_decode($ressponse, true);
var_dump($decoded);
curl_close($ch);