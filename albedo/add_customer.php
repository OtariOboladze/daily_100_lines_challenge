<?php

if (isset($_POST['enviar'])) {

    require 'connection.php';

    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $comentario = $_POST['comentario'];
    $cliente = $_POST['cliente'];

    $sql = "INSERT INTO clients VALUES (NULL,'$nombre', '$fecha', '$comentario', '$cliente')";
    $insert = mysqli_query($conn, $sql) ;
    echo $sql;
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            width: 80%;
            margin: 0 auto;
        }

        div {
            background-color: rgb(200, 200, 200);
            padding: 20px;
        }

        label {
            display: inline-block;
            width: 150px;
        }
    </style>
</head>

<body>
    <div>
        <br>
        <h1>Añadir cliente</h1>
        <br>
        <form action="#" method="post">
            <label for="nombre" size="50">Nombre: </label>
            <input type="text" name="nombre" id="nombre"><br><br>
            <label for="date" size="50">Fecha alta: </label>
            <input type="date" name="fecha" id="date"><br><br>
            <label for="comments" size="50">comentarios: </label>
            <textarea name="comentario" id="comments"></textarea><br><br>
            <label for="cliente" size="50">tipo de cliente: </label>
            <input type="text" name="cliente" id="cliente" placeholder="low·normal·special"><br><br>
            <input type="submit" name="enviar" id="enviar" value="Enviar">
    </div>
    </form>
</body>

</html>