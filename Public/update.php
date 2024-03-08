<?php
$animalId = 5;
$url = 'http://localhost:8001/rest/' . $animalId;

$datosActualizados = [
    'especie' => 'León Modificado',
    'peso' => 160,
    'altura' => 110,
    'fechaNacimiento' => '2023-02-01',
    'alimentacion' => 'Carnívoro Modificado',
    'descripcion' => 'Un león majestuoso modificado',
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datosActualizados));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error al realizar la solicitud cURL: ' . curl_error($ch);
} else {
    $decoded = json_decode($response, false);
    print_r($decoded);
    foreach ($decoded as $decode) {
        echo '<p>' . $decode->mensaje . '</p>';
    }
}
curl_close($ch);