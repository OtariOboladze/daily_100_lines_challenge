<?php

$base = 5;
$altura = 10;

$area = calc_area($base, $altura);
// echo "<br/>";
echo "el area es: $area";


function calc_area($b, $a)
{
    $calculo = $b * $a;
    return $calculo;
}
