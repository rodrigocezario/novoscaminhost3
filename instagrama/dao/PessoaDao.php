<?php

class PessoaDao extends AbstractDao {

    public function salvar($obj) {
        //sql inject: código malicioso
        $sql = "insert into Pessoa (PessoaNome, PessoaNick, PessoaEmail, PessoaFoto, PessoaSenha, PessoaDataCad) values (?, ?, ?, ?, ?, ?)";
        //Statement
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $obj->getNome(), PDO::PARAM_STR);
        $st->bindValue(2, $obj->getNick(), PDO::PARAM_STR);
        $st->bindValue(3, $obj->getEmail(), PDO::PARAM_STR);
        $st->bindValue(4, $obj->getFoto(), PDO::PARAM_STR);
        $st->bindValue(5, $obj->getSenha(), PDO::PARAM_STR);

        $data = new DateTime();

        $st->bindValue(6, $data->format("Y-m-d H:i:s"), PDO::PARAM_STR);
        $st->execute();
    }

    public function atualizar($obj){

    }

    public function excluir($id){
        $sql = "delete from Pessoa where PessoaID = ?";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $id, PDO::PARAM_INT);
        $st->execute();
    }

    public function logar($dto) {
        $sql = "select * from Pessoa where PessoaEmail = ? and PessoaSenha = ?";
        $st = $this->conexao->prepare($sql);
        $st->bindValue(1, $dto->getLogin(), PDO::PARAM_STR);
        $st->bindValue(2, $dto->getSenha(), PDO::PARAM_STR);

        $st->setFetchMode(PDO::FETCH_ASSOC);
        $st->execute();
        $rs = $st->fetch();

        if(empty($rs)){
            throw new Exception("Usuário não encontrado!");
        }

        $pessoa = new Pessoa();
        $pessoa->setId($rs["PessoaID"]);        
        $pessoa->setNome($rs["PessoaNome"]);        
        $pessoa->setNick($rs["PessoaNick"]);        
        $pessoa->setEmail($rs["PessoaEmail"]);        
        $pessoa->setFoto($rs["PessoaFoto"]);        
        $pessoa->setDataCadastro($rs["PessoaDataCad"]);        

        return $pessoa;
    }

    
}
