<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //incluir o script para processar neste script
        include "classes/pessoa.php"; //vamos refatorar
    ?>
    <h1>Estudos sobre OO</h1>

    <h1>Pessoa1</h1>
    <?php
        //criei uma instância: objeto
        $pessoa1 = new Pessoa;
        //atribuindo um valor para um atributo do objeto
        $pessoa1->nome = "Rodrigo";//setar (setter)
        $pessoa1->idade = 43;
        $pessoa1->documento = "206.678.678-98";

        //obtendo o valor do atributo
        echo "Nome: $pessoa1->nome";//obter - (getter)
        echo "<br>Idade: $pessoa1->idade";
        echo "<br>Documento: $pessoa1->documento";
    ?>

</body>
</html>