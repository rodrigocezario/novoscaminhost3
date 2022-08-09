<?php 

class CurtidaDao extends AbstractDao {

    public function salvar($obj) {
        $sql = "insert into Curtida (PubID, PessoaID) values (?, ?)";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $obj->getPublicacao()->getId(), PDO::PARAM_STR);
        $st->bindValue(2, $obj->getPessoa()->getId(), PDO::PARAM_STR);   
        $st->execute();     
    }

    public function excluir($id) {
        $sql = "delete from Curtida where CurtID = ?";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $id, PDO::PARAM_INT);
        $st->execute();
    }

    public function atualizar($obj) {
        throw new Exception("Método não implementado!");
    }

    public function getCurtidas($publicacao_id) {
        $sql = "select * from Curtida where PubID = ?";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $publicacao_id, PDO::PARAM_INT);
        $st->execute();

        $lista = [];
        while ($reg = $st->fetch(PDO::FETCH_ASSOC)) {
            $curtida = new Curtida($reg["PessoaID"], $reg["PubID"]);
            $curtida->setId($reg["CurtID"]);
            $lista[] = $curtida;
        }

        return $lista;
    }

    public function getCurtidaByPessoa($pessoa, $publicacao_id) {
        $sql = "select * from Curtida where PessoaID = ? and PubID = ?";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $pessoa->getId(), PDO::PARAM_INT);
        $st->bindValue(2, $publicacao_id, PDO::PARAM_INT);
        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        $rs = $st->fetch();
        
        if (empty($rs)) {
            return null;
        }

        $curtida = new Curtida($rs["PessoaID"], $rs["PubID"]);
        $curtida->setId($rs["CurtID"]);
        $lista[] = $curtida;
        return $curtida;
    }

}
