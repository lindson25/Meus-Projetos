<?php
    // atributo para criar conexão
    $db_name = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_ = 'banco';

    $con = new mysqli("localhost", "root", "", "banco");

    if($con->error){
        die("Falha ao conectar ou banco de dados" . $con->error);
    }
?>