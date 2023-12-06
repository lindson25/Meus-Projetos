<?php

include("BackEnd/login/protect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="style.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap">
    <title>SAA - Consultar Reclamações</title>
</head>
<body>
    <!-- Container azul do site -->
    <div class="container-fluid" style="background-color: #3296D4; color: white; display: flex; justify-content: center; align-items: center;">
        <div class="container text-center">
            <!-- Logo do cabeçalho -->
            <img src="img/todojunto.png" class="img-fluid" alt="Imagem do Cabeçalho">
        </div>
    </div>
    <br>
    <p><a href="logout.php">Sair</a></p>

    <!-- Conteúdo no meio da página -->
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8">
                <h1>Dados do Banco de Dados</h1>

    <table border="1" cellpadding="10" border-collapse: collapse;>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Matricula</th>
                <th>Email</th>
                <th>Problema</th>
                <th>Localizacao</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            
            // Conexão com o banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "saa3";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

        // Verifica se um formulário foi submetido para excluir um registro
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];

            // Consulta SQL para excluir o registro
            $sql_delete = "DELETE FROM chamados WHERE id = $delete_id";

            if ($conn->query($sql_delete) === TRUE) {
                echo "Registro excluído com sucesso!";
            } else {
                echo "Erro ao excluir o registro: " . $conn->error;
            }
        }

            // Consulta SQL para obter os dados
            $sql = "SELECT id, Nome, Matricula, Email, Problema, Localizacao, foto FROM chamados";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Exibindo os dados na tabela
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['Nome'] . "</td>";
                    echo "<td>" . $row['Matricula'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Problema'] . "</td>";
                    echo "<td>" . $row['Localizacao'] . "</td>";
                    echo '<td><img src="BackEnd/fotos/' . $row['foto'] . '" width="100" height="100"/></td>';
                    echo '<td><a href="BackEnd/fotos/' . $row['foto'] . '" download>Baixar</a></td>';
                    echo '<td><form method="post"><input type="hidden" name="delete_id" value="' . $row['id'] . '"/><button type="submit">Resolvido</button></form></td>';

                    echo "</tr>";
                }
            } else {
                echo "0 resultados";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
            </div>
        </div>
    </div>

    

    <!-- Footer -->
    <footer class="container-fluid text-center mt-3" style="background-color: #3296D4; color: white; padding: 20px;">
        <!-- Informações do rodapé -->
        <p>&copy; 2023 SAA - Serviço de Atendimento ao Aluno. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Script personalizado -->
    <script src="script.js"></script>
</body>
</html>