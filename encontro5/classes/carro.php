<?php

//classe que irá representar (estrutura) um carro
class Carro {

    //atributos (informações - internas)
    public $cor;
    public $quantidadePortas;
    public $marca;
    public $modelo;
    private $motor; //1.0 ou 2.0 1.4., 1.6
    private $velocidade;

    //construtor da classe (método mágico)
    function __construct($motor) { //stdClass (objeto) herdou
        $this->velocidade = 0;
        $this->motor = $motor;
    }

    //operações (que faz)
    public function acelerar($pressao) {
        echo "<br>Acelerando...";
        $this->velocidade = $this->velocidade + (($this->velocidade +  1) * $pressao) + rand(0, 10);
    }

    //também chamado de interface
    function frear() {
        if($velocidade > 0) {
            $this->velocidade--;
        }
    }

    //encapsulamento
    function getVelocidade() {
        return $this->velocidade;
    }

    function getMotor() {
        return $this->motor;
    }

    function setMotor($motor) {
        //alguma regra...
        $this->motor = $motor;
    }

} //fim da classe carro

class Motor {

    private $potencia;

    function __construct($potencia) {
        $this->potencia = $potencia;
    }

    public function getPotencia() {
        return $this->potencia;
    }

}


//criando uma instância de carro: ou seja, um objeto do tipo carro

$motorFraco = new Motor(3000);

$fusca = new Carro($motorFraco);
$fusca->modelo = "Fusca";
$fusca->marca = "Vokswage";
$fusca->cor = "Branca";

$kombi = new Carro(new Motor(1600));
$kombi->modelo = "Kombi";
$kombi->marca = "Vokswage";
$kombi->cor = "Azul";

$motorSuperPotente = new Motor(5000);
$fusca2 = new Carro($motorSuperPotente);
$fusca2->modelo = "Fusca furioso";
$fusca2->marca = "Vokswage";
$fusca2->cor = "Preto";

$porche = new Carro($motorSuperPotente);
$porche->modelo = "Porche caveira";

//vetor de carros
$pista = [$fusca, $fusca2, $kombi, $porche];


function imprimir($pista) {
    echo "<br>************<br>";
    foreach ($pista as $carro) {
        echo "<br>$carro->modelo - $carro->cor - Potencia: ". $carro->getMotor()->getPotencia();
        echo " - ". $carro->getVelocidade();
    }
}

imprimir($pista);

foreach ($pista as $carro) {
    $pressao = rand(1, 50);
    //acelerar cada carro
    $carro->acelerar($pressao);
    //$carro->acelerar($pressao);
    echo "<br>Pressão: $pressao";
}


$fusca->setMotor($motorSuperPotente);

imprimir($pista);




// foreach ($pista as $carro) {
//     echo "<br>$carro->modelo - $carro->cor";
//     echo " - $carro->velocidade";
// }


