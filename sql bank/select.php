<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

//header para caracteres castellano
header('Content-Type: text/html; charset=UTF-8');

try {
    require 'connection_bank_1.php';

    $sql = "SELECT nombre FROM personas ORDER BY nombre";

    if (!$resultado = mysqli_query($connection_bank, $sql)) {
        throw new Exception(mysqli_error($connection_bank));
    }
mysqli_aff
    // print_r($resultado);

    //შეამოწმე დბ აბრუნებს თუ არა 0 რიგს
    // ORI VERSIA
    // if (mysqli_num_rows($resultado) == 0) {
    if ($resultado->num_rows == 0) {
        throw new Exception("El nif no existe en la base de datos");
    }

    //თუ დბ აბრუნებს უეჭველად ერთ რიგს, ერთგანზომილებიანი არაის მისაღებად:
    // $datos = mysqli_fetch_assoc($resultado);

    // echo "<pre>" . print_r($datos, true) . "</pre>";

    //თუ დბ აბრუნებს მრავალ რიგს, მრავალგანზომილებიანი არაის მისაღებად:
    //fetch all და fetch array არ იძლევიან ასოსიატურ არაის
    $rows = [];
    while ($datos = mysqli_fetch_assoc($resultado)) {
        array_push($rows, $datos);
    }

    echo "<pre>" . print_r($rows, true) . "</pre>";
} catch (Exception $e) {

    echo $e->getMessage();
}
