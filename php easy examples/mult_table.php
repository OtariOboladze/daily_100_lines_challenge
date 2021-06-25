<?php

$numero = $resultado = null;

if (isset($_POST['enviar'])) {
    try {
        $tabla = $_POST['numero'];
        if (!is_numeric($tabla)) {
            throw new Exception("Debe introducir un numero", 11);
        }
        if ($tabla <= 0 || $tabla >= 10) {
            throw new Exception('Numero fuera de rango', 10);
        }
        for ($c = 1; $c <= 10; $c++) {
            $resultado .= "$tabla x $c = " . ($tabla * $c) . '<br>';
        }
    } catch (Exception $e) {
        $resultado = $e->getCode() . ' ' . $e->getMessage();
    }
}

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noteas examen</title>
</head>

<body>
    <form method="post" action="#">
        <input type="text" name="numero" value="<?= $numero; ?>">
        <input type="submit" name="enviar" value="Enviar"><br>
        <p><?= $resultado ?></p>
    </form>
</body>

</html>