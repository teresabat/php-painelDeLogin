<?php
// incluir o arquivo de conexão com o banco de dados
include 'db.php';

if ($_SERVER['REMOTE_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha
    $email = $_POST['email']; //opcional

    // inserir dados na tabela users
    $sql = "INSERT INTO users(username, password, email) values (:username, :password, :email)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Registro realizado com sucesso.";
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>
<html>

<body>
    <h2>Registro de Usuário</h2>
    <form action="register.php" method="post">
        <label>Usuário</label><br>
        <input type="text" name="username" required><br>

        <label>Senha</label><br>
        <input type="password" name="password" required><br>

        <label>E-mail:</label><br>
        <input type="email" name="email"><br>

        <input type="submit" value="Registrar">
    </form>
</body>

</html>