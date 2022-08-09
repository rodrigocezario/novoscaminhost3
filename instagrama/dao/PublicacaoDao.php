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

    public function listar() {
        
    }



}
