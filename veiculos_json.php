<?php
include_once("conexao.php");

try {
    $sql = "SELECT * FROM veiculos";
    $resultado = $conexao->query($sql);
    
    $veiculos = [];
    while($linha = $resultado->fetch_assoc()) {
        $veiculos[] = $linha;
    }

    // Define que o navegador deve ler isso como JSON
    header('Content-Type: application/json');
    echo json_encode($veiculos);

} catch (Exception $erro) {
    echo json_encode(["erro" => $erro->getMessage()]);
}
$conexao->close();
?>