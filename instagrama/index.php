<?php 

function verificaLogado(){
    //se não estiver logado, que seja redirecionado para tela de login
    if(!isset($_SESSION["USUARIO"])){
       //redirecionar
       header("Location: login.php"); 
    }     
} 

session_start();
//remover
//$_SESSION["USUARIO"] = "Rodrigo";
verificaLogado(); //chamada da função

//isset($_SESSION["USUARIO"])

// if (isset($_SESSION["USUARIO"])){
//     echo "Usuário existe";
// }else {
//     echo "Usuário NÃO existe"; 
// }

if(isset($_GET["acao"])) {
    if($_GET["acao"] == "sair"){
        session_destroy();//removendo todas as variáveis de sessão
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
    <title>Document</title>
</head>
<body>
    <h1>Seja bem-vindo!</h1>
    <h2><?php echo $_SESSION["USUARIO"]; ?></h2>
    <div>
        <p>
            <a href="index.php?acao=sair">Sair</a>
        </p>
    </div>
</body>
</html>