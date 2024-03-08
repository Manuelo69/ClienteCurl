<?php

$ch = curl_init("http://localhost:8001/api/productos");

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo curl_errno($ch);
} else {
    //true asociativo, false objeto
    $decoded = json_decode($response, false);
    /*foreach ($decoded as $decode) {
        echo '<p>' . $decode->slug . '</p>';
    }*/
    foreach ($decoded->data as $producto) {
        // Accede a las propiedades de cada objeto stdClass
        $id = isset($producto->id) ? $producto->id : '';
        $nombre = isset($producto->nombre) ? $producto->nombre : '';
        $descripcion = isset($producto->descripcion) ? $producto->descripcion : '';
        $precio = isset($producto->precio) ? $producto->precio : '';
        $createdAt = isset($producto->created_at) ? $producto->created_at : '';
        $updatedAt = isset($producto->updated_at) ? $producto->updated_at : '';

        // Haz lo que necesites con cada conjunto de datos
        echo "<p> ID: $id, Nombre: $nombre, Descripción: $descripcion, Precio: $precio, Creado en: $createdAt, Actualizado en: $updatedAt</p>";
    }
}

curl_close($ch);