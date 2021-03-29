<?php

$numero = $resultado = null;

if (isset($_POST['enviar'])) {
    if (($tabla = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT)) && ($tabla >= 0 && $tabla <= 10)) {
        for ($c = 1; $c <= 10; $c++) {
            $resultado .= "$tabla x $c = " . ($tabla * $c) . '<br>';
        }
    } else {
        $resultado = 'Debe introducir un numero entre 0 y 10';
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