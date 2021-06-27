<?php

//array de paises capitales
$paises = array('erti'=>'ori', 'sami'=>'otxi', 'xuti' => 'eqvsi', 'shvidi' => 'rva');

//recuperar la capital a consultar
$capital = $_GET['capital'];

//buscar la capital dentro de array
$pais = array_search($capital, $paises);

//mensaje de respuesta
echo $pais;
