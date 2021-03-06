<?php

//header para caracteres castellano
header('Content-Type: text/html; charset=UTF-8');

//variables para sql insert
$nif = 'ragdfjeje';
$nombre = addslashes('rumfertg&/geee');
$apellido = addslashes('hagidedasa');
// $apellido = '); DROP TABLE personas #';  <-  code injection 
$direccion = 'mdaaa';
$telefono = '543345';
$email = 'klde@mgelkua.com';

try {
    //incorporar fichero de coneccion
    require 'connection_bank_2.php';

    //habilitar transaccion
    mysqli_autocommit($connection_bank, FALSE);

    //insert en la tabla de personas
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
    $idp = mysqli_insert_id($connection_bank);

    //insert en la tabla de cuentas
    $entidad = '0634';
    $oficina = '0780';
    $dc = '86';
    $cuentas = '16345';
    $saldo = 234;

    $sql_2 = "INSERT INTO cuentas VALUES (NULL, '$entidad', '$oficina', '$dc', '$cuentas', '$saldo', DEFAULT)";

    if (!mysqli_query($connection_bank, $sql_2)) {
        if (mysqli_errno($connection_bank) == 1062) {
            throw new Exception("Cuenta ya existe en base de datos");
        } else {
            throw new Exception(mysqli_error($connection_bank));
        }
    };

    //recuperar la clave primaria asignado a la cuenta
    $idc = mysqli_insert_id($connection_bank);

    //insert en la tabla de relacion
    $sql_3 = "INSERT INTO personas_cuentas VALUES ('$idp','$idc')";

    if (!mysqli_query($connection_bank, $sql_3)) {
        if (mysqli_errno($connection_bank) == 1062) {
            throw new Exception("Relacion ya existe en base de datos");
        } else {
            throw new Exception(mysqli_error($connection_bank));
        }
    };

    //trasladar los cambios a bd
    mysqli_commit($connection_bank);

    echo "persona añadida corctamente con el id $idp y cuenta $idc";
} catch (Exception $e) {

    //free up resources
    mysqli_rollback($connection_bank);

    echo $e->getMessage();
}
