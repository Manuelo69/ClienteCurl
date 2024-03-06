<?php


// URL a la que se enviará la petición POST
$url = 'http://localhost:8001/rest/insertar';
$ch = curl_init($url);
// Datos que se enviarán en la solicitud POST 
$postData = array(
    'especie' => 'Halcon',
    'slug' => 'halcon',
    'peso' => 55,
    'altura' => 100,
    'fechaNacimiento' => "2018-01-25",
    'alimentacion' => 'de to',
    'descripcion' => 'Está to guapo'
);
// Configurar opciones cURL
//curl_setopt($ch, CURLOPT_URL, $url);

//obtener codigo de estado HTTP
//curl_getinfo();

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);
//echo var_dump($response);
/*
// Verificar errores
if (curl_errno($ch))
    echo curl_errno($ch);
else {
    $decoded = json_decode($response,true);
    var_dump($decoded);
    echo $decoded['message'];
}
// Cerrar la sesión cURL*/
curl_close($ch);
