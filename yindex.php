<?php

$message = $nombre = $numero = $edad = $message = '';

// print_r($_GET); //aray visualize

if (isset($_REQUEST['enviar'])) {
    $nombre = $_REQUEST['nombre'];
    $numero = $_REQUEST['telefono'];
    $edad = $_REQUEST['edad'];
    $message = "<br>$nombre $edad $numero";
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
</head>

<body>
    <form action="#" method="get" autocomplete="off">
        <input type="text" name="nombre" placeholder="nombre" required value="<?= $nombre; ?>">
        <input type="number" name="telefono" placeholder="telefono" required value="<?= $numero; ?>">
        <input type="password" name="passwrd">
        <input type="text" name="edad" placeholder="edad"><br><br>
        <input type="submit" value="Enviiiar" name="enviar">
        <br>
        <?= $message; ?>
    </form>
</body>

</html>