<?php

$resultado = $nota = null;

if (isset($_POST['enviar'])) {
    $nota = $_POST['nota'];

    if (!is_numeric($nota)) {
        $resultado = 'nota no numerica';
    } else if ($nota < 0 || $nota > 10) {
        $resultado = 'nota fuera de rango';
    } else if ($nota == 10) {
        $resultado = 'Matricula';
    } else if ($nota > 5) {
        $resultado = 'Aprobado';
    } else if ($nota == 5) {
        $resultado = 'Por los pelos';
    } else {
        $resultado = 'Suspenso';
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>noteas examen</title>
</head>

<body>
    <form method="post" action="#">
        <input type="text" name="nota" value="<?=$nota;?>">
        <input type="submit" name="enviar" value="Submit">
        <input type="text" disabled value="<?= $resultado ?>">
    </form>
</body>

</html>