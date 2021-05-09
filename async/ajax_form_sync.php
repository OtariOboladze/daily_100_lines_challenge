<?php
//inicializar variables
$mensaje = $texto = $nombre = $apellidos = null;

//comprobar si se ha pulsado enviar
if (isset($_POST['enviar'])) {
    //recuperar los datos
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);

    try {
        //validar los dato
        if (empty($nombre)) {
            throw new Exception("nombre obligatorio", 10);
        }
        if (empty($apellidos)) {
            throw new Exception("Apellido obligatorio", 11);
        }

        //confeccionar el mensaje
        $texto = "$nombre $apellidos";
    } catch (Exception $e) {
        $mensaje = $e->getCode() . ' ' . $e->getMessage();
    }
}


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <input type="text" name="nombre" value="<?= $nombre ?>"><br>
        <input type="text" name="apellidos" value="<?= $apellidos ?>"><br><br>
        <input type="submit" name="enviar"><br><br>
        <textarea cols="30" rows="10"><?= $texto ?></textarea><br><br>
        <span><?= $mensaje ?></span>
    </form>
</body>

</html>