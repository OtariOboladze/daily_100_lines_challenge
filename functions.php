<?php

$resultado = $error = $base = $altura = null;

if (isset($_POST['enviar'])) {
    //recuperar datos
    $base = $_POST['base'];
    $altura = $_POST['altura'];

    try {
        $resultado = calc_area($base, $altura);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

function calc_area($b, $a, $c = 0)
{
    try {
        if (!is_numeric($b)) {
            throw new Exception("Base no numerica", 10);
        }
        if (!is_numeric($a)) {
            throw new Exception("Altura no numerica", 11);
        }
        if (!is_numeric($c)) {
            throw new Exception("Area extra no numerica", 12);
        }

        $calculo = $b * $a;
        return $calculo;
    } catch (Exception $e) {
        throw new Exception($e->getMessage(), $e->getCode());
    }
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
</head>

<body>
    <form action="#" method="post">
        <label for="base">Base</label>
        <input type="text" name="base" id="base" value="<?=$base?>">
        <br>
        <label for="altura">Altura</label>
        <input type="text" name="altura" id="altura" value="<?=$altura?>">
        <br>
        <input type="submit" name="enviar" value="Calcular">
        <br>
        <input type="text" readonly value="<?= $resultado ?>">
        <span><?= $error ?></span>
    </form>
</body>

</html>