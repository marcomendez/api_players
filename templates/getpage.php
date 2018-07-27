<?php
$app = new \Slim\Slim();
$app->get('/books/:id', function ($id) {
    //Show book identified by $id
});
?>