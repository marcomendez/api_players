<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/api/getplayer', function () {

    $query = 'SELECT *FROM  players';

    try{
        $db = new db();
        $db = $db->connectar();
        $execute = $db->query($query);
        $clientes = $execute->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        echo json_encode($clientes);
    }
    catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().' }';
    }
});

$app->get('/api/getplayer/:id', function ($id) {

    $query = "SELECT *FROM  players WHERE id=$id";

    try{
        $db = new db();
        $db = $db->connectar();
        $execute = $db->query($query);
        $clientes = $execute->fetchAll(PDO::FETCH_OBJ);
        $db = null;

        echo json_encode($clientes);
    }
    catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().' }';
    }
});