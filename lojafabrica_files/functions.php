<?php

define('SITE_ROOT', '/centro40/lojafabrica/');
session_start();

function connectBD() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "loja_fabrica";
    
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function getSelectBD($sql) {
    $connection = connectBD();
    $dados = array();
    
    $query = $connection->query($sql);
    while ($registro = $query->fetch_array()) {
        array_push($dados, $registro);
    }
    mysqli_close($connection);
    return $dados;
}

function execCommandBD($sql) {
    $connection = connectBD();
    $return = false;
    $query = $connection->query($sql);
    if ($query){
        if($connection->insert_id){
            $return = $connection->insert_id;
        } else {
            $return = true;
        }
    } else {
        $return = $query->error;
    }
    mysqli_close($connection);
    return $return;
}

?>