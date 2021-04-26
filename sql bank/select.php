<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//header para caracteres castellano
header('Content-Type: text/html; charset=UTF-8');

try {
    require 'connection_bank_1.php';

    $sql = "SELECT * FROM personas";

    if (!$resultado = mysqli_query($connection_bank, $sql)) {
        throw new Exception(mysqli_error($connection_bank));
    }

    // print_r($resultado);

    //comprobar si la consulta devuelve algunda fila
    // ORI VERSIA
    // if (mysqli_num_rows($resultado) == 0) {
    if ($resultado->num_rows == 0) {
        throw new Exception("El nif no existe en la base de datos");
    }

    //extraer los datos que devuelve de db
    // $datos = mysqli_fetch_assoc($resultado);

    // echo "<pre>" . print_r($datos, true) . "</pre>";
    // echo "<br>";
    // echo "mgeli";
    // echo "<br>";

    //return multiple rows
    $rows = [];
    while ($datos = mysqli_fetch_assoc($resultado)) {
        array_push($rows, $datos);
    }

    echo "<pre>" . print_r($rows, true) . "</pre>";
} catch (Exception $e) {

    echo $e->getMessage();
}
