<?php

require_once "configuracoes.php";
require_once "funcoes.php";

session_start();
//remover
//$_SESSION["USUARIO"] = "Rodrigo";
$usuario = verificaLogado(); //chamada da função

//isset($_SESSION["USUARIO"])

// if (isset($_SESSION["USUARIO"])){
//     echo "Usuário existe";
// }else {
//     echo "Usuário NÃO existe"; 
// }

if (isset($_GET["acao"])) {
    if ($_GET["acao"] == "sair") {
        session_destroy(); //removendo todas as variáveis de sessão
        header("Location: login.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Instagrama</title>
</head>

<body>
    <div class="container">

        <div class="d-flex justify-content-end w-100">
            <div class="w-100">
                <h1><?php echo $usuario->getNome(); ?></h1>
            </div>
            <div class="my-2">
                <a href="#">Ação...</a>
            </div>
            <div class="my-2 ms-2">
                <a href="index.php?acao=sair">Sair</a>
            </div>
        </div>


        <div>
            <form action="index.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="foto" class="form-label">Arquivo</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Adicione um comentário para sua foto" id="comentario" name="comentario" style="height: 100px"></textarea>
                    <label for="comentario">Comentário</label>
                </div>

                <div class="my-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100">Enviar</button>
                </div>

            </form>

            <?php 
            
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                try {
                    $publicacaoDao = new PublicacaoDao;

                    $publicacao = new Publicacao($usuario);
                    $foto = uploadFoto($_FILES["foto"]);
                    $publicacao->setFoto($foto);
                    $publicacao->setTexto($_POST["comentario"]);

                    $publicacaoDao->salvar($publicacao);

                    echo "<div class='alert alert-success' role='alert'>
                    Post realizado com sucesso!
                    </div>";

                } catch (\Throwable $th) {
                    echo "<div class='alert alert-danger' role='alert'>
                    Erro ao realizar o post: ". $th->getMessage() ."
                    </div>";
                }
            }
            
            ?>

        </div>



    </div>
</body>

</html>