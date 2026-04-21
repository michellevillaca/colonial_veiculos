<?php
include_once("conexao.php");

// Verificamos se a placa foi enviada pelo formulário
if(isset($_GET['placa_busca'])) {
    $placa = $_GET['placa_busca'];

    try {
        $sql = "SELECT * FROM veiculos WHERE placa = '$placa'";
        $resultado = $conexao->query($sql);

        echo "<div style='font-family: Arial; padding: 20px; color: #2c3e50;'>";

        if ($resultado->num_rows > 0) {
            $veiculo = $resultado->fetch_assoc();
            echo "
            <div style='max-width: 500px; margin: 0 auto; border: 1px solid #3498db; border-radius: 8px; padding: 20px; background: #ebf5fb;'>
                <h2 style='color: #2980b9;'>🔍 Veículo Encontrado</h2>
                <hr>
                <p><strong>Placa:</strong> " . $veiculo['placa'] . "</p>
                <p><strong>Marca:</strong> " . $veiculo['marca'] . "</p>
                <p><strong>Modelo:</strong> " . $veiculo['modelo'] . "</p>
                <p><strong>Cor:</strong> " . $veiculo['cor'] . "</p>
                <p><strong>Ano Fabricação/Modelo:</strong> " . $veiculo['ano_fab'] . "/" . $veiculo['ano_mod'] . "</p>
                <p><strong>Quilometragem:</strong> " . $veiculo['km'] . "</p>
                <p><strong>Observações:</strong> " . $veiculo['obs'] . "</p>
                <br>
                <a href='cadastro.html' style='text-decoration: none; color: #3498db; font-weight: bold;'>← Nova Consulta</a>
            </div>";
        } else {
            echo "<p style='text-align: center; color: #e74c3c;'>❌ Veículo com placa <strong>$placa</strong> não encontrado no estoque.</p>";
            echo "<p style='text-align: center;'><a href='consulta.html'>Voltar à página de consulta</a></p>";
        }
        
        echo "</div>";

    } catch (Exception $erro) {
        echo "Erro técnico: " . $erro->getMessage();
    }
}
$conexao->close();
?>