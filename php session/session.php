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

//baja personas (todos)
if (isset($_GET['baja_personas'])) {
    $array_personas = [];
}

//baja perona
if (isset($_POST['bajaPersona'])) {
    //recuperar nif
    $nif_baja = $_POST['nif'];
    try {
        //validar nif
        if (empty($nif_baja)) {
            throw new Exception("Nif obligatorio", 14);
        }

        //borrar fila del array
        unset($array_personas[$nif_baja]);

        //mensaje para informar
        $mensajes = 'Baja efectuada';
    } catch (Exception $e) {
        $mensajes = $e->getCode() . ' ' . $e->getMessage();
    }
}

//modificacion de persona seleccionada
if (isset($_GET['modificar'])) {
    //recuperar datos sin whitespace
    $nif = trim($_GET['nif_mod']);
    $nombre = trim($_GET['nombre_mod']);
    $direccion = trim($_GET['direccion_mod']);

    try {
        //validar datos
        if (empty($nif)) {
            throw new Exception("Nif obligatorio", 100);
        }
        if (empty($nombre)) {
            throw new Exception("Nombre obligatorio", 110);
        }
        if (empty($direccion)) {
            throw new Exception("Direccion obligatorio", 120);
        }

        //validate nif uniqueness
        if (!array_key_exists($nif, $array_personas)) {
            throw new Exception("El NIF no existe", 130);
        }

        //modificar persona en el array
        $array_personas[$nif]['nombre'] = $nombre;
        $array_personas[$nif]['direccion'] = $direccion;

        //mensaje alta efectuada
        $mensajes = 'Modificacion efectuada';

        //limpiar form si alta efectuada
        $nif = $nombre = $direccion = null;
        
    } catch (Exception $e) {
        $mensajes = $e->getCode() . ' ' . $e->getMessage();
    }
}

//consulta personas
foreach ($array_personas as $key_nif => $value_columna) {
    $filas_tabla .= "<tr>";
    $filas_tabla .= "<td class='nif'>$key_nif</td>";
    $filas_tabla .= "<td contenteditable class='nombre'>$value_columna[nombre]</td>";
    $filas_tabla .= "<td contenteditable class='direccion'>$value_columna[direccion]</td>";
    //2 version for input text
    // $filas_tabla .= "<td class='direccion'><input type='text' value='$value_columna[direccion]'></td>";
    $filas_tabla .= "<td>";
    $filas_tabla .= "<form method='post' action='#'>";
    $filas_tabla .= "<input type='hidden' name='nif' value='$key_nif'>";
    $filas_tabla .= "<input type='submit' name='bajaPersona' value='baja'>";
    $filas_tabla .= "</form>";
    $filas_tabla .= "&nbsp<button type='button' class='modificar'>Modificar</button>";
    $filas_tabla .= "</td>";
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
        <!-- <form action="#" method="get" id="form_baja" onsubmit="return confirm('Do you really want to submit the form?')"> -->
        <form action="#" method="get" id="form_baja">
            <input type="hidden" name="baja_personas">
            <button type="button" id="baja">Baja personas</button>
        </form>
        <!-- form oculto para modificacion -->
        <form action="#" method="get" id="form_oculto">
            <input type="hidden" name="nif_mod">
            <input type="hidden" name="nombre_mod">
            <input type="hidden" name="direccion_mod">
            <input type="hidden" name="modificar">
        </form>
    </div>
    <?= '<pre>' . print_r($array_personas, true) . '</pre>'; ?>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>