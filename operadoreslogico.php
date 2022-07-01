<?php

//operadores lógico
//E - & (textual - and)
//OU - | (textual - or)
//Negação ! 

//true e false

$num1 = 10;
$num2 = 20;

//E = restringe (ambos tem que ser verdade)
$resultado = (($num1 > $num2) || ($num1 < 15));

//OU = ampla (qualquer um dos valores sendo verdade vai ser verdade)
$resultado = (($num1 > $num2) and ($num1 > 15) && true);



var_dump($resultado);
