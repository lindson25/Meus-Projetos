<?php
    // atributo para criar conexão
    $db_name = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_ = 'saa3';

    $con = new mysqli("localhost", "root", "", "saa3");

    if($con->error){
        die("Falha ao conectar ou banco de dados" . $con->error);
    }
?>