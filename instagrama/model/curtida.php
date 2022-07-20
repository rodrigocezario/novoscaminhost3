<?php

class Curtida {

    private $id;
    private $pessoa;

    public function __construct($pessoa) {
        $this->pessoa = $pessoa;
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

}