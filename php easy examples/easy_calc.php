<?php

$resultado = $numero2 = $numero1 = $oper = null;

if (isset($_POST['Calcular'])) {
    $numero1 = $_POST['num1'];
    $numero2 = filter_input(INPUT_POST, 'num2');
    $oper = filter_input(INPUT_POST, 'operation');
    /*
    switch ($oper) {
        case '+':
            $resultado = $numero1 + $numero2;
            break;
        case '-':
            $resultado = $numero1 - $numero2;
            break;
        case '*':
            $resultado = $numero1 * $numero2;
            break;
        case '/':
            $resultado = $numero1 / $numero2;
            break;
        default:
            $resultado = 0;
    }
    */
}

($numero2 == 0 && $oper == '/') ?
    ($resultado = 'no se puede dividir por cero') :
    $resultado = eval("return " . $numero1 . $oper . $numero2 . ";");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calc</title>
</head>
<body>
    <form action="#" method="post">
        <input type="number" name="num1" required value="<?= $numero1 ?>">
        <select name="operation">
            <option <?php if ($oper == '+') {echo 'selected';} ?>>+</option>
            <option <?php if ($oper == '-') {echo 'selected';} ?>>-</option>
            <option <?php if ($oper == '*') {echo 'selected';} ?> value="*" >x</option>
            <option <?php if ($oper == '/') {echo 'selected';} ?>>/</option>
        </select>
        <input type="number" name="num2" required value="<?= $numero2 ?>">
        <input type="submit" name="Calcular" value="Calculate" required>
        <input type="text" readonly value="<?= $resultado; ?>">
    </form>
</body>

</html>