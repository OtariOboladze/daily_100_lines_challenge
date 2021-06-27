<?php

//array de paises capitales
$paises = array('erti'=>'ori', 'sami'=>'otxi', 'xuti' => 'eqvsi', 'shvidi' => 'rva');


//1 same as 2
$capitales = [];
//extraer los datos del array
foreach ($paises as $value) {
    array_push($capitales, $value);
}

//2
// $capitales = array_values($paises);

echo json_encode($capitales);
