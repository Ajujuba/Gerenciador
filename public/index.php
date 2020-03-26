<?php

require __DIR__ . '/../vendor/autoload.php';


use Alura\Cursos\Controller\InterfaceControladorRequisicao;


$caminho = $_SERVER['PATH_INFO']; //pega o caminho das rotas
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas)){ // verifica se existe o caminho q peguei nas rotas e n entra no array se tiver
    http_response_code(404);
    exit();  
}

$classeControladora = $rotas[$caminho]; //aqui pega o valor da rota, pra onde ela vai
$controlador = new $classeControladora(); //com php se eu tenho numa variável o valor de uma string que é o nome de uma variável pode instanciar assim
$controlador->processaRequisicao();

