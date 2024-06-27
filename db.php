<?php
$host = 'localhost';
$dbname = 'users';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;db=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
    exit;
}