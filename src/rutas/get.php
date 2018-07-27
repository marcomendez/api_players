<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\Slim();

// Trae todos los jugadores de la base de datos
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

// Trae un jugador de la base de datos desde su id
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

// Add un jugador
$app->post('/api/insert/:id/:name/:apellido', function ($id,$name,$apellido) {
    echo "id: " .$id  ;
    echo "<br/>";
    echo "nombre: " .$name  ;
    echo "<br/>";
    echo "apellido; " .$apellido;

    $query = "INSERT INTO players(id,name,last_name)values('$id','$name','$apellido')";

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