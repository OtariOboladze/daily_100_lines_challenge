<?php

// METODO GENERAL

// $numeros = [9,3,'785',5,true];

// print_r($numeros);
// echo '<br>';
// var_dump($numeros);
// echo '<br>';
// echo $numeros[3];
// echo '<br>';

// foreach ($numeros as $index => $value) {
//     // OR foreach ($numeros as $value) {
//     echo "el indice $index contiene el valor $value <br>";
// }



// METODO 2

$colores = array('witeli','yviteli', 'mwvane', 'kata');

//add at the end
array_push($colores, 'tetri');

//add at the beginning
array_unshift($colores, 'mgeli');

//washale bolo 
array_pop($colores);

//washale pirveli
array_shift($colores);

//washale nebismieri (no reorganiza los indices del array, casi exclusivamente para arrays asociativos)
unset($colores[1]);

//romeli poziciidan waishalos da ramdeni, reorganizacia xdeba, se utiliza para arrays escalares
array_splice($colores, 2, 1);

$mgeli =  array_slice($colores, 1, 2);

print_r($colores);
echo '<br>';
print_r($mgeli);
