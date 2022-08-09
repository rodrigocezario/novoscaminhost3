<?php

class Curtida {

    private $id;
    private $pessoa;
    private $publicacao;

    public function __construct($pessoa, $publicacao) {
        $this->pessoa = $pessoa;
        $this->publicacao = $publicacao;
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

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function getPublicacao()
    {
        return $this->publicacao;
    }
}