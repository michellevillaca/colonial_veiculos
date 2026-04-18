<?php
//Incluindo o arquivo de conexão com o banco de dados para estabelecer a conexão e permitir a execução de consultas SQL.
include_once("conexao.php");

// 1. Recebendo os dados do formulário via POST
// Os nomes entre [''] devem ser exatamente os mesmos do "name" dos campos no HTML
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano_fabricacao = $_POST['ano_fab'];
$ano_modelo = $_POST['ano_mod'];
$cor = $_POST['cor'];
$combustivel = $_POST['combustivel'];
$km = $_POST['km'];
$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$cadastro = $_POST['cadastro'];
$observacao = $_POST['obs'];

try {
    // 2. Preparando a query SQL de inserção
    $sql = "INSERT INTO veiculos (placa, marca, modelo, ano_fabricacao, ano_modelo, cor, combustivel, km, chassi, renavam, cadastro, observacao) 
            VALUES ('$placa', '$marca', '$modelo', '$ano_fabricacao', '$ano_modelo', '$cor', '$combustivel', '$km', '$chassi', '$renavam', '$cadastro', '$observacao')";
    
    // 3. Executando a query usando o objeto de conexão
    if ($conexao->query($sql) === TRUE) {
        echo "Veículo cadastrado com sucesso!";
        echo "<p>O veículo de placa <strong>$placa</strong> foi cadastrado na Colonial Veículos.</p>";
        echo "<br><a href='index.php'>Voltar para o formulário</a>";
    } else {
        throw new Exception("Erro ao cadastrar veículo: " . $conexao->error);
    }
} catch (Exception $erro) {
    // Se ocorrer um erro, exibe na tela a mensagem de erro
    echo "Erro detectado: " . $erro->getMessage();
} finally {
    // 4. Fecha a conexão com o banco de dados
    $conexao->close();
}
?>