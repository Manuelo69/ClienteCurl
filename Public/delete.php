<?php

$data = array('id' => 8);
$url = "http://127.0.0.1:8000/rest/8/borrar";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_errno($ch);
} else {
    echo $response;
}
curl_close($ch);