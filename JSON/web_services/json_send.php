<?php

//array associativo a enviar al frontend
// $array = array();

$array_personas['persona_1'] = array('name' => 'apple', 'gvari' => 'mgelkuadshvili');
$array_personas['persona_2'] = array('name' => 'samsung', 'gvari' => 'mgelkuadze');

//convertir a json
$json_personas = json_encode($array_personas, true);

echo $json_personas;
