<?php

//implementação do padrão singleton
class Conexao {

    //1 - unico ponto de acesso (método) para obter a instancia
    //2 - manter a conexão para toda a aplicação

    private static $conexao = null; //não pode ser da instancia (tem que ser da classe)

    private function __construct()
    {
        
    }

    //getInstance (quando singleton)
    public static function getConnection() {
        if(!isset(self::$conexao)){
            self::$conexao = new PDO('mysql:host=uol.com.br;dbname=fotoweb', 'root', '');
        }
        return self::$conexao;
    }

    //método herdado de stdClass (classe base do PHP)
    function __clone()
    {
        //lançando um erro em execução ao chamar o método
        throw new Exception('Não se pode clonar um singleton!');
    }

}



