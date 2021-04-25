<?php

try {
    //incorporar fichero de coneccion
    require 'connection_bank_1.php';

    //sentencias SQL
    $sql = "INSERT INTO personas VALUES (NULL, 'A122f34B', 'safxefli','gvari','misamarti','1223223',NULL, DEFAULT)";

    //ejecutar query
    if (!mysqli_query($connection_bank, $sql)) {
        if (mysqli_errno($connection_bank) == 1062) {
            throw new Exception("El nif ya existe en base de datos");
        } else {
            throw new Exception(mysqli_error($connection_bank));
        }
    };

    //recuperar la clave primaria asignada
    $id = mysqli_insert_id($connection_bank);

    echo "persona añadida corctamente con el id $id";
} catch (Exception $e) {
    echo $e->getMessage();
}
