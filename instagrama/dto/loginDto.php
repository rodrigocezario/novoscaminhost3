<?php 

class LoginDto {

    private $login;
    private $senha;

    public function __construct($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }
}

