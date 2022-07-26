<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Arquivo de teste</h1>

    <?php 
    
    require_once "configuracoes.php";

    try {
        
        //depois vou setar os valores vindo do formulário
        $pessoa = new Pessoa();
        $pessoa->setNome("Rodrigo");
        $pessoa->setNick("@rodrigo");
        $pessoa->setEmail("rodrigo@algumacoisa.com");
        $pessoa->setSenha("123vai");
        
        $dao = new PessoaDao;
        if(isset($_GET["acao"])){
            if($_GET["acao"] == "incluir") {
                $dao->salvar($pessoa);
                echo "Pessoa salva com sucesso!";
            }
        }

        if(isset($_GET["id"]) && isset($_GET["acao"])){
            if($_GET["acao"] == "excluir") {
                $id = $_GET["id"];
                $dao->excluir($id);
                echo "<br>O id $id foi excluído!";
            }
        }


    } catch (\Throwable $th) {
        echo "Erro ao salvar pessoa: ". $th->getMessage();
    }
    
    ?>

</body>
</html>