<?php

header('Content-Type: Text/html; charset=UTF_8');

$arrayPaises = ['Francia' => 'Paris', 'Georgia' => 'Tbilisi', 'Spain' => 'Madrid', 'Imereti' => 'Terjola', 'Argentina' => 'Buenos Aires'];

// echo count($arrayPaises);

foreach($arrayPaises as $k => $v){
    echo "La capital de $k es $v <br>";
}

$clave = array_search('Terjola', $arrayPaises);
echo $clave;


?>