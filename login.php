<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>

<?php
// login.php

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Conexão com o banco de dados

    $servername = 'localhost';
    $useranme = 'root';
    $password = '';
    $dbname = 'users';

    // cria conexão

    $conn = new mysqli($servername, $username, $password, $dbname);

    // verifica conexao

    if ($conn->connect_error) {
        die('Erro na conexão: ' . $conn->connect_error);
    }

    // prepara e executa a query

    $stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usario['senha'])) {
            // senha correta, inicia a sessao
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: perfil.php"); // redireciona para a pagina de perfil do usuario
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuári não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>