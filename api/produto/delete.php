<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: 
    Access-Control-Allow-Headers, 
    Content-Type, 
    Access-Control-Allow-Methods,
    Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Produto.php';

    $database = new Database();
    $db = $database->conectar();

    $produto = new Produto($db);

    $data = json_decode(file_get_contents('php://input'));

    $produto->setId($data->id);

    if($produto->delete()) {
        echo json_encode(
            array("mensagem" => "Produto removido com sucesso!")
        );
    } else {
        echo json_encode(
            array("mensagem" => "Produto nao foi removido.")
        );
    }

 