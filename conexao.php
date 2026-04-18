<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "colonial_veiculos";

try {
    // Criando a conexão com o banco de dados
    $conexao = new mysqli($host, $usuario, $senha, $banco);
    
    // connect_error é uma propriedade do objeto mysqli que retorna uma string descrevendo o erro de conexão, ou uma string vazia se não houver erro. Se a conexão falhar, lançamos uma exceção com a mensagem de erro.
    if ($conexao->connect_error) {
        throw new Exception("Conexão falhou: " . $conexao->connect_error);
    }
    
    $conexao->set_charset("utf8mb4");
    
} catch (Exception $erro) {
    // Se ocorrer um erro, exibimos a mensagem de erro e encerramos o script
    echo "Erro detectado: " . $erro->getMessage();
    exit();
}
?>