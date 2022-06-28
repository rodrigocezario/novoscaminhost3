<?php

echo "Olá mundo com PHP<br>";
$codigo = 15; //variável
$codigo = 10;

define('PI', 3.1415);//definir constante no PHP

$PI = 3.1415; //constante

echo "O valor de pi é " . $PI; //cancatenando

$PI = 1;

echo "O valor de pi é " . PI; 

$nome = "Rodrigo";
$idade = 43;
$dataHoje = date('d/m/Y');

$pontuacao_maxima = 10;
$pontuacaoMaximaObtida = 10;

echo "Eu, $nome hoje, $dataHoje estou com $idade anos.<br>";



//echo "O valor da variável código é: $codigo\n";
//echo 'Esse é um texto onde utilizei apostofo: $codigo';

echo "O valor de código: $codigo<br>O valor de Código:";


//string
$nome = "Rodrigo";

//integer (inteiro)
$dataNascimentoDia = 27;
$dataNascimentoMes = 6;
$dataNascimentoAno = 2022;

//boolean (lógico sim ou não)
$estamosEmAula = false; //false

//tipagem dinamica
$estamosEmAula = 10;

//Float (decimal)
$salario = 9.300;

//object (objeto)
$objeto = new stdClass;

//array (coleções ou vetores)
$colecaoRoupa = ['Camisa', 'Bermuda', 'Short', 'Blusa'];

//Resource (recurso)
$conexaoBancoDados = mysql_connection('', '', '');

//Null (nulo)
$nada = null;





//$qualAnimalVoceSeria = new Animal;




?>


