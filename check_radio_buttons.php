<?php

if (isset($_POST['enviar'])) {
    //recuperar radio buttons
    //radio buttons NEEDS TO BE SAME NAME
    if ($radio = filter_input(INPUT_POST, 'radios')) {
        echo "$radio<br>";
    }
    //recuperar checks
    //checks NEEDS TO BE ARRAY
    if(isset($_POST['checks'])){
        $check = $_POST['checks'];
        
        foreach($check as $v){
            echo "$v<br>";
        }
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio buttons</title>
</head>

<body>
    <form action="#" method="post">

        <label for="">Radios</label>
        <input type="radio" name="radios" value="1" checked>Valor 1
        <input type="radio" name="radios" value="2">Valor 2
        <input type="radio" name="radios" value="3">Valor 3
        <br><br>
        <label for="">Checks</label>
        <input type="checkbox" name="checks[]" value="1">Valor 1
        <input type="checkbox" name="checks[]" value="2">Valor 2
        <input type="checkbox" name="checks[]" value="3">Valor 3
        <br><br>
        <input type="submit" name="enviar">
    </form>
</body>

</html>