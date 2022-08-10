<?php

class Publicacao {

    private $id;
    private $autor; //tipo Pessoa
    private $data;
    private $foto;
    private $texto;
    private $curtidas; //lista de pessoas que curtiram

    public function __construct($autor){
        $this->autor = $autor;
        $this->curtidas = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
        return $this;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto)
    {
        $this->texto = $texto;
        return $this;
    }

    public function getCurtidas()
    {
        return $this->curtidas;
    }

    public function adicionarCurtida($curtida) {
        $this->curtidas[] = $curtida;
    }

    public function getTotalCurtidas() {
        return sizeof($this->curtidas);
    }

    public function setCurtidas($curtidas)
    {
        $this->curtidas = $curtidas;
        return $this;
    }
}
