<?php

use App\Models\DAO\PessoaDAO;
use App\Models\Entidades\Pessoa;
use App\Lib\Erro;
use App\Lib\Conexao;
use App\App;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

session_start();

error_reporting(E_ALL & ~E_NOTICE);

require_once("vendor/autoload.php");

try {

  $app = new \Slim\App;


  $app->get('/listar', function (Request $request, Response $response) use ($app) {
    
    $pessoaDAO = new PessoaDAO();
    $id = $params[0];
    $pessoas = $pessoaDAO->listar($id);
    var_dump($pessoas);
    return $pessoas;
  });

  $app->run();

}catch (\Exception $e){
    $oError = new Erro($e);
    $oError->render();
}
