<?php

//procedimento
function semRetorno() {
    echo "Executando algo...";
}

function comRetorno() {
    return "Retornando algo";
}

semRetorno();

$variavel = comRetorno();

function somar($valor1, $valor2) {
    return $valor1 + $valor2;
}

$resultado = soma(10, 20);

int calcular(int valor1, int valor2) {
    semRetorno();
    return valor1 + valor2;
}

void semRetorno(String texto) {

}


//Classe
//Objeto

//tipos de dados
//primitivos: numeros (inteiros; decimal); booleans; 
//complexos: objetos; vetores ou arrays