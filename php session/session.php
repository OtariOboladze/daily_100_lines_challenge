<?php

session_start();

$nif = $nombre = $direccion = $mensajes = $filas_tabla = null;

$array_personas = [];

if (isset($_SESSION['personas'])) {
    $array_personas = $_SESSION['personas'];
}

//alta personas
if (isset($_POST['alta'])) {
    //recuperar datos sin whitespace
    $nif = trim($_POST['nif']);
    $nombre = trim($_POST['nombre']);
    $direccion = trim($_POST['direccion']);

    try {
        //validar datos
        if (empty($nif)) {
            throw new Exception("Nif obligatorio", 10);
        }
        if (empty($nombre)) {
            throw new Exception("Nombre obligatorio", 11);
        }
        if (empty($direccion)) {
            throw new Exception("Direccion obligatorio", 12);
        }

        //validate nif uniqueness
        if (array_key_exists($nif, $array_personas)) {
            throw new Exception("El NIF ya existe", 13);
        }

        //guardar persona en el array
        $array_personas[$nif]['nombre'] = $nombre;
        $array_personas[$nif]['direccion'] = $direccion;

        //mensaje alta efectuada
        $mensajes = 'Alta efectuada';

        //limpiar form si alta efectuada
        $nif = $nombre = $direccion = null;
    } catch (Exception $e) {
        $mensajes = $e->getCode() . ' ' . $e->getMessage();
    }
}

//baja personas
if(isset($_POST['baja'])){
    $array_personas = [];
}

//consulta personas
foreach ($array_personas as $key_nif => $value_columna) {
    $filas_tabla .= "<tr>";
    $filas_tabla .= "<td>$key_nif</td>";
    $filas_tabla .= "<td>$value_columna[nombre]</td>";
    $filas_tabla .= "<td>$value_columna[direccion]</td>";
    $filas_tabla .= "<td></td>";
    $filas_tabla .= "</tr>";
}

$_SESSION['personas'] = $array_personas;

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="wrapper">
        <form action="#" method="post">
            <label for="nif">NIF</label>
            <input type="text" name="nif" id="nif" value="<?= $nif ?>"><br>
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?= $nombre ?>"><br>
            <label>Direccion</label>
            <input type="text" name="direccion" value="<?= $direccion ?>"><br><br>
            <input type="submit" name="alta" value="alta persona"><br><br>
            <span><?= $mensajes ?></span>
        </form>
        <br><br>
        <table>
            <tr>
                <th>NIF</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th></th>
            </tr>
            <?= $filas_tabla ?>
        </table>
        <br>
        <form action="#" method="post" id="form_baja">
            <button name="baja" value="baja personas" id="baja">Submit</button>
        </form>
    </div>
    <?= '<pre>' . print_r($array_personas, true) . '</pre>'; ?>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>