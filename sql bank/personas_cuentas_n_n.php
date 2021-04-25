<?php

try {
    //incorporar fichero de coneccion
    require 'connection_bank_2.php';

//variables para sql insert
$nif = 'ragferdfererfgtjme';
$nombre = addslashes('rumfertgj·$%!"·%&/geee'); 
$apellido = addslashes('hagidedasa');
// $apellido = '); DROP TABLE personas #';  <-  code injection 
$direccion = 'mdaaa';
$telefono = '543345';
$email = 'klde@mgelkua.com';

    //sentencias SQL
    $sql = "INSERT INTO personas VALUES (NULL, '$nif', '$nombre','$apellido','$direccion','$telefono','$email', DEFAULT)";

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

    echo "persona añadida corctamente con el id $id y emial $email";
} catch (Exception $e) {
    echo $e->getMessage();
}
