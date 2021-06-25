<?php

//recuperar los datos de la peticion
$json_personas = $_POST['personas'];

//convertir a array associativo
$array_personas = json_decode($json_personas, true);

// print_r($array_personas);

foreach ($array_personas as $key => $value) {
    echo "$key: $value[nombre] y $value[direccion] \n";
}
