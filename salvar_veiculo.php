<?php
//Incluindo o arquivo de conexão com o banco de dados para estabelecer a conexão e permitir a execução de consultas SQL.
include_once("conexao.php");

// 1. Recebendo os dados do formulário via POST
// Os nomes entre [''] devem ser exatamente os mesmos do "name" dos campos no HTML
$placa = $_POST['placa'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$ano_fab = $_POST['ano_fab'];
$ano_mod = $_POST['ano_mod'];
$cor = $_POST['cor'];
$combustivel = $_POST['combustivel'];
$km = $_POST['km'];
$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$cadastro = $_POST['cadastro'];
$obs = $_POST['obs'];

try {
    // 2. Preparando a query SQL de inserção
    $sql = "INSERT INTO veiculos (placa, marca, modelo, ano_fab, ano_mod, cor, combustivel, km, chassi, renavam, cadastro, obs) 
            VALUES ('$placa', '$marca', '$modelo', $ano_fab, $ano_mod, '$cor', '$combustivel', $km, '$chassi', '$renavam', '$cadastro', '$obs')";
    
    // 3. Executando a query usando o objeto de conexão
if ($conexao->query($sql) === TRUE) {
    echo "
    <div style='font-family: Arial; text-align: center; margin-top: 50px; color: #2c3e50;'>
        <div style='display: inline-block; padding: 30px; border: 2px solid #27ae60; border-radius: 10px; background: #f9fffb;'>
            <h1 style='color: #27ae60;'>✔️ Sucesso!</h1>
            <p>O veículo de placa <strong>$placa</strong> foi cadastrado com êxito.</p>
            <br>
            <a href='cadastro.html' style='text-decoration: none; background: #27ae60; color: white; padding: 10px 20px; border-radius: 5px;'>Voltar ao Formulário</a>
        </div>
    </div>";
} else {
        throw new Exception("Erro técnico: " . $conexao->error . " | SQL: " . $sql);
    }
} catch (Exception $erro) {
    // Se ocorrer um erro, exibe na tela a mensagem de erro
    echo "Erro detectado: " . $erro->getMessage();
} finally {
    // 4. Fecha a conexão com o banco de dados
    $conexao->close();
}
?>