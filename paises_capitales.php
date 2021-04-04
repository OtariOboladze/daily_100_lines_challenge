<?php

$combo = $pais = $capit = $capital = null;

$arrayPaises = ['Francia' => 'Paris', 'Georgia' => 'Tbilisi', 'Spain' => 'Madrid', 'Imereti' => 'Terjola', 'Argentina' => 'Buenos Aires'];

//detectar cuando cambia combo
if (isset($_POST['capitales'])) {
    $capital = $_POST['capitales'];
    $pais = array_search($capital, $arrayPaises);
}

//montar de forma dinamica
foreach ($arrayPaises as $capit) {
    $sel = null;
    if ($capit == $capital) {
        $sel = 'selected';
    }
    $combo .= "<option $sel>$capit</option>";
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">

        <select name="capitales" onchange="this.form.submit()">
            <option disabled selected>Seleccione una capital</option>
            <?= $combo ?>
        </select>
        <input type="text" disabled value="<?= $pais ?>">
    </form>
</body>

</html>