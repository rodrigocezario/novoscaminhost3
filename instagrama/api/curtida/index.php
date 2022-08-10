<?php 

session_start();

require_once "../../funcoes.php";
require_once "../../configuracoes.php";

if (isset($_GET["id"])) {

    try {
        $usuario = verificaLogado();
        $dao = new CurtidaDao;
        $id = $_GET["id"]; //código publicacao

        $curtida = $dao->getCurtidaByPessoa($usuario, $id);

        $retorno = "Curtindo a publicação $id";
        $curtiu = false; //flag

        if($curtida) {
            $dao->excluir($curtida->getId());
            $retorno = "Removendo a curtinda da publicação $id";
        }else{

            $publicacaoDao = new PublicacaoDao;
            $publicacao = $publicacaoDao->getPublicacao($id);
            $curtir = new Curtida($usuario, $publicacao);
            $dao->salvar($curtir);
            $curtiu = true;
        }

        //REST
        http_response_code(201);
        $retorno = [
            "success" => true,
            "payload" => [
                "curtiu" => $curtiu,
                "mensagem" => $retorno
            ]
        ];
        $json = json_encode($retorno);
        echo $json;
    } catch (\Throwable $th) {
        http_response_code(400);
        $retorno = [
            "success" => false,
            "payload" => [
                "curtiu" => false,
                "mensagem" => "Erro ao enviar curtida: ". $th->getMessage()
            ]
        ];
        $json = json_encode($retorno);
        echo $json;
    }
}


