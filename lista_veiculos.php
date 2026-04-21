<?php
    include_once("conexao.php");
    $sql = "SELECT * FROM veiculos";
    $resultado = $conexao->query($sql);
    $dados = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($dados);
?>