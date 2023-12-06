<?php

  include ('config.php');

    

    if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $con->real_escape_string($_POST['email']); 
        $senha = $con->real_escape_string($_POST['senha']); 
       
        $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $con->query($sql_code) or die("Falha na execução do codigo SQL; " . $con->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: pag04.php");

        } else {
            echo "Falha ao logar! E-mail ou senha incorretos ";
        }

    }
}
?>