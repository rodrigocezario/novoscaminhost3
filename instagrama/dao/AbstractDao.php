<?php

//classe abstrata: server para abstração 
//(não permite criar instancias)
//permite ter métodos concretos (com corpo: implementação)
//permite ter métodos abtratos (somente a sua assinatura)

abstract class AbstractDao implements IComumDao {

    //Modificadores de visibilidade
    //private = privado (acessivel somente no escopo da classe)
    //public = publico (pode ser acessado de fora da classe)
    //protected = protegido (heranças)
    //subclasses = tem acesso como se fosse publico
    //outras (usam) = não tem o acesso ao atributo (como se fosse privado)
    protected $conexao = null;

    function __construct()
    {
        try {
            $this->conexao = Conexao::getConnection();
        } catch (\Throwable $th) {
            throw $th; //lançando para a camada acima
        }
    }

}

