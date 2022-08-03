<?php 

$PASTA_UPLOAD = "fotos/";
$TAMANHO_NOME_ARQUIVO = 10;
$TIPOS_PERMITIDOS = ["jpg", "jpeg", "png", "gif"];

function uploadFoto($fileUpload) {

    global $TAMANHO_NOME_ARQUIVO, $PASTA_UPLOAD, $TIPOS_PERMITIDOS;
    $nome_arquivo = gerarFotoNome($TAMANHO_NOME_ARQUIVO);
    $arquivo = $PASTA_UPLOAD . basename($fileUpload["name"]);
    $arquivo_tipo = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

    if(!in_array($arquivo_tipo, $TIPOS_PERMITIDOS)){
        throw new Exception("O tipo do arquivo selecionado não é permitido o envio!");
    }

    $novo_arquivo = $nome_arquivo . "." . $arquivo_tipo;

    if(!move_uploaded_file($fileUpload["tmp_name"], $PASTA_UPLOAD . $novo_arquivo)){
        throw new Exception("Erro ao mover arquivo no upload!");
    }

    return $novo_arquivo;
}

function gerarFotoNome($tamanho) {
    $chars = "abcdefghijklmnopkrstuvwxyz";
    $var_size = strlen($chars);
    $random_str = "";
    for($i = 0; $i < $tamanho; $i++){
        $random_str .= $chars[rand(0, $var_size - 1)];
    }
    return $random_str;
}
