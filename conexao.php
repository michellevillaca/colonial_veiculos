<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "colonial_veiculos";

try {
    $conexao = new mysqli($servername, $username, $password, $database);
    
    if ($conexao->connect_error) {
        throw new Exception("Conexão falhou: " . $conexao->connect_error);
    }
    
    $conexao->set_charset("utf8mb4");
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
    exit();
}
?>