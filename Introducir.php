<?php


// URL a la que se enviará la petición POST
$url = 'http://127.0.0.1:8000/rest/insertar';
$ch = curl_init($url);
// Datos que se enviarán en la solicitud POST (puedes ajustar esto según tus necesidades)
$postData = array(
    'especie' => 'Halcon',
    'slug' => 'halcon',
    'peso' => 55,
    'altura' => 100,
    'fechaNacimiento' => "2018-01-25",
    'alimentacion' => 'de to',
    'descripcion' => 'Está to guapo'
    // Agrega más campos según sea necesario
);

// Inicializar la sesión cURL

$datos_convertidos = http_build_query($postData);
// Configurar opciones cURL
//curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos_convertidos);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

// Verificar errores
if (curl_errno($ch))
    echo curl_errno($ch);
else
    $decoded = json_decode($response, true);

if ($decoded !== null) {
    var_dump($decoded);
} else {
    echo 'Error al decodificar la respuesta JSON';
}

// Cerrar la sesión cURL
curl_close($ch);