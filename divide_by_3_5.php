<?php

$numero = $resultado = null;

if (isset($_POST['enviar'])) {
    if ($numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT)) {
        for ($i = 1; $i < $numero; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                $resultado .= 'FizzBuzz';
            } else if ($i % 3 == 0) {
                $resultado .= 'Fizz';
            } else if ($i % 5 == 0) {
                $resultado .= 'Buzz';
            } else {
                $resultado .= $i;
            }
            $resultado .= '<br>';
        }
    } else {
        $resultado = 'Debe informar un numero valido';
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
        <input type="text" name="numero" value="<?= $numero; ?>">
        <input type="submit" name="enviar" value="Enviar"><br>
        <p><?=$resultado?></p>
    </form>
</body>

</html>