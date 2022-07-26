<?php

//Data Access Object
interface IComumDao { //padronizando (definido um contrato)

    //CRUD
    //Create = criar (salvar) - OK
    //Read = leitura (buscar)
    //Update = atualizar - OK
    //Delete = apagar - OK

    public function salvar($obj);
    public function atualizar($obj);
    public function excluir($id);

}
