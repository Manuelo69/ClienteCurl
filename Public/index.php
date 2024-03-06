<?php

$ch = curl_init("http://localhost:8001/rest");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo curl_errno($ch);
} else {
    //true asociativo, false objeto
    $decoded = json_decode($response, false);
    foreach ($decoded as $decode) {
        echo '<p>'.$decode->slug.'</p>';
    }
}
curl_close($ch);
