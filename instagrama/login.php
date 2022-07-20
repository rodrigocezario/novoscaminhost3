<?php 

require "dao/conexao.php";

//teste com a conexão com banco de dados

try {
    
    $conexao = Conexao::getConnection();
    echo "Conexão com banco de dados realizada com sucesso!";

} catch (\Throwable $th) {
    //throw $th;
    echo "Erro ao conectar com BD: ". $th->getMessage() ;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autenticação de usuário</h1>

    <form action="login.php" method="post">
        <h2>Formulário com POST</h2>

        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login"> 
        </div>

        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <input type="submit" value="Enviar">
    </form>

    <?php
        //outra superglobal
        //exibir todos os valores para cada chave
        //$_SERVER["chave"] = "valor"
        // foreach($_SERVER as $chave => $valor){
        //     echo "<br>$chave: $valor";
        // }

        //ESSE CÓDIGO SERÁ REFATORADO EM BREVE!!!
        session_start();
        //login e senha mockados
        $LOGIN = "rodrigo";
        $SENHA = "123vai";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            //echo "Processando o formulário com post!";
            if(isset($_POST["login"]) && isset($_POST["senha"])) {
                //processar meu login
                $login = $_POST["login"]; 
                $senha = $_POST["senha"]; 

                if($login == $LOGIN && $senha == $SENHA){
                    //sucesso!
                    $_SESSION["USUARIO"] = "Rodrigo Cezario";
                    header("Location: index.php");
                }else {
                    echo "Login ou senha incorreto!";
                }

            }
        }
    ?>



</body>
</html>
