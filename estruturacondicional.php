<?php

$idade = 20;
$dinheiro = false;

// if (($idade >= 18) && ($dinheiro == true)) {
//     echo "Maior de idade: $idade";
//     echo "<br>Seja bem-vindo a vida adulta!";
// } else {
//    echo "Você ainda não é adulto!"; 
// }

//aninhamentos
// if ($idade < 18) {
//     echo "Você ainda não é adulto.";
// } else if ($idade >= 18 && $dinheiro) {
//     echo "Adulto vida boa!";
// } else if ($idade >= 18 && !$dinheiro) {
//     echo "Adulto vida boa também!";
// } else {
//     echo "entrei no else..";
// }


switch($idade) {
    case 10:
        echo "Sua idade é de 10 anos";
        break;
    case 18:
        echo "Você é maior de idade.";
        break;
    default:
        echo "Você não tem 10 nem 18 anos";         
}



echo "<br>Fim do programa";
