<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Utilização de Veículo</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    <h2>Cadastro de Utilização de Veículo</h2>
    <form action="" method="post">
        <label for="codigoVeiculo">Código do Veículo:</label>
        <input type="text" id="codigoVeiculo" name="codigoVeiculo" required>

        <label for="codigoVendedor">Código do Vendedor:</label>
        <input type="text" id="codigoVendedor" name="codigoVendedor" required>

        <label for="dataUtilizacao">Data de Utilização:</label>
        <input type="date" id="dataUtilizacao" name="dataUtilizacao" required>

        <button type="submit">Cadastrar Utilização de Veículo</button>
    </form>

    <?php
    include_once 'DAO/UtilizacaoVeiculoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoVeiculo = $_POST['codigoVeiculo'];
        $codigoVendedor = $_POST['codigoVendedor'];
        $dataUtilizacao = $_POST['dataUtilizacao'];

        UtilizacaoVeiculoDAO::cadastrarUtilizacaoVeiculo($codigoVeiculo, $codigoVendedor, $dataUtilizacao);
    }

    ?>


</body>

</html>