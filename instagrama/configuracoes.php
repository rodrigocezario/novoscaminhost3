<?php

//porque iremos utilizar datas (new DateTime)
date_default_timezone_set("America/Sao_Paulo");

spl_autoload_register(function($class_name) {
    $modelo = __DIR__ . "/model/";
    $dao = __DIR__ . "/dao/";
    $dto = __DIR__ . "/dto/";

    $pastas = [$modelo, $dao, $dto];
    foreach ($pastas as $pasta) {
        $arquivo = $pasta . $class_name . ".php";
        if(file_exists($arquivo)){
            require_once $arquivo;
        }
    }

});

