<?php


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