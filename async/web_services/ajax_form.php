<?php
//WEB SERVICE PARA TRATAR EL FORMULARIO 


//inicializar variables
// $mensaje = $texto = $nombre = $apellidos = null;

//comprobar si se ha pulsado enviar
// if (isset($_POST['enviar'])) {
//recuperar los datos
$nombre4 = trim($_POST['nombre3']);
$apellidos = trim($_POST['apellidos']);

try {
    //validar los dato
    if (empty($nombre4)) {
        throw new Exception("nombre obligatorio", 10);
    }
    if (empty($apellidos)) {
        throw new Exception("Apellido obligatorio", 11);
    }

    //confeccionar el mensaje tipo texto
    // $mensaje = "00$nombre $apellidos";

    //confeccionar el mensaje tipo array
    $mensaje = array("00", "$nombre4 $apellidos");
} catch (Exception $e) {
    //confeccionar mensaje de error tipo texto
    // $mensaje = $e->getCode() . ' ' . $e->getMessage();

    //confeccionar mensaje de error tipo array
    $mensaje = array($e->getCode(), $e->getMessage());
}
// }


//enviar la respuesta del servidor (texto)
// echo $mensaje;

//enviar la respuesta del servidor (json)
sleep(2); //detener la ejecution del codigo 2s
echo json_encode($mensaje);
