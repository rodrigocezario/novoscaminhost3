<?php 

class PublicacaoDao extends AbstractDao {

    public function salvar($obj) {
        $sql = "insert into Publicacao (PessoaID, PubData, PubArquivo, PubTexto) values (?, ?, ?, ?)";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $obj->getAutor()->getId(), PDO::PARAM_INT);
       
        $data = new DateTime();

        $st->bindValue(2, $data->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $st->bindValue(3, $obj->getFoto(), PDO::PARAM_STR);
        $st->bindValue(4, $obj->getTexto(), PDO::PARAM_STR);
        $st->execute();
    }

    public function atualizar($obj){

    }

    public function excluir($id){

    }

    public function listar($pessoa) {

        $sql = "select u.PessoaID, u.PessoaNick, p.PubID, p.PubData, p.PubArquivo, p.PubTexto from Publicacao p inner join Pessoa u on (u.PessoaID = p.PessoaID) where p.PessoaID in (select AmigoID from PessoaAmigos where PessoaID = ? union select ?) order by p.PubData desc";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $pessoa->getId(), PDO::PARAM_INT);
        $st->bindValue(2, $pessoa->getId(), PDO::PARAM_INT);
        $st->execute();

        $lista = [];
        while($reg = $st->fetch(PDO::FETCH_ASSOC)){

            $publicacao = new Publicacao($pessoa);
            $publicacao->setId($reg["PubID"]);
            $publicacao->setFoto($reg["PubArquivo"]);
            $publicacao->setData($reg["PubData"]);
            $publicacao->setTexto($reg["PubTexto"]);

            //adicionar as curtidas

            $lista[] = $publicacao;
        }

        return $lista;
    }



}
