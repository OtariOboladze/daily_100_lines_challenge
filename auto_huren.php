<?php

//init varibles
$error = $noches = $ciudad = $coche = $total = null;

//constantes
const PRECIO_NOCHE = 60;
const PRECIO_DIA_ALQUILER = 40;

if (isset($_POST['enviar'])) {

    $noches = $_POST['noches'];
    $ciudad = $_POST['ciudad'];
    $coche = $_POST['coche'];

    try {
        //calculo hotel
        $precioHotel = costeHotel($noches);
        //calculo del avion
        $precioAvion = costeAvion($ciudad);
        //calculo del coche
        $precioCoche = costeCoche($coche);

        //calculo del coste total
        $total = $precioHotel + $precioAvion + $precioCoche;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

function costeHotel($n)
{
    try {
        //validar datos
        if (!is_numeric($n) || $n <= 0) {
            throw new Exception("Informar noches numerico y mayor que cero");
        }
        //realizar calculo
        $calculo = PRECIO_NOCHE * $n;
        //retornar el calculo
        return $calculo;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
}

function costeAvion($c)
{
    try {
        // if ($c == '') {
        if (empty($c)) {
            throw new Exception("Se debe seleccionar una ciudad");
        }

        //evaluar el cotenido
        switch ($c) {
            case 'Madrid':
                return 150;
            case 'Paris':
                return 250;
            case 'Los Angeles':
                return 400;
            case 'Roma':
                return 200;
            default:
                throw new Exception("Ciudad no permitida");
        }
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
};
function costeCoche($a)
{
    try {
        if (!empty($a) && (!is_numeric($a) || $a <= 0)) {
            throw new Exception("Dias de alquiler debe ser numerico y mayor que uno");
        }
        //realizar calculo
        $calculo = $a * PRECIO_DIA_ALQUILER;
        if ($a >= 7) {
            $calculo -= 50;
        } else if ($a >= 3) {
            $calculo -= 20;
        }

        //retornar el calculo
        return $calculo;
    } catch (Exception $e) {
        throw new Exception($e->getMessage());
    }
};

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        label {
            width: 150px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <form action="#" method="post">
        <label for="noches">Numero de noches</label>
        <input type="number" name="noches" value="<?= $noches ?>" min='1'><br><br>
        <label for="">Destino:</label>
        <select name="ciudad">
            <option <?php if ($ciudad == 'Madrid') {
                        echo 'selected';
                    } ?>>Madrid</option>
            <option <?php if ($ciudad == 'Paris') {
                        echo 'selected';
                    } ?>>Paris</option>
            <option <?php if ($ciudad == 'Los Angeles') {
                        echo 'selected';
                    } ?>>Los Angeles</option>
            <option <?php if ($ciudad == 'Roma') {
                        echo 'selected';
                    } ?>>Roma</option>
        </select><br><br>
        <label for="">Dias alquiler coche:</label>
        <input type="number" name="coche" value="<?= $coche ?>"><br><br>
        <input type="submit" name="enviar" value="Enviar"><br><br>
        <label for="">Coste total: </label>
        <input type="text" name="Total" readonly value="<?= $total ?>">
    </form><br>
    <span><?= $error ?></span>
</body>

</html>