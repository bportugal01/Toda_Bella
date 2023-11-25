<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veiculo</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    <h2>Cadastro de Veiculo</h2>
    <form action="" method="post">
        <label for="codigoVeiculo">Código do Veiculo:</label>
        <input type="text" id="codigoVeiculo" name="codigoVeiculo" required>

        <label for="placaVeiculo">Placa do Veiculo:</label>
        <input type="text" id="placaVeiculo" name="placaVeiculo" required>

        <label for="tipoVeiculo">Tipo do Veiculo:</label>
        <input type="text" id="tipoVeiculo" name="tipoVeiculo" required>

        <label for="modeloVeiculo">Modelo do Veiculo:</label>
        <input type="text" id="modeloVeiculo" name="modeloVeiculo" required>

        <button type="submit">Cadastrar Veiculo</button>
    </form>

    <?php
    include_once 'DAO/VeiculoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoVeiculo = $_POST['codigoVeiculo'];
        $placaVeiculo = $_POST['placaVeiculo'];
        $tipoVeiculo = $_POST['tipoVeiculo'];
        $modeloVeiculo = $_POST['modeloVeiculo'];

        VeiculoDAO::cadastrarVeiculo($codigoVeiculo, $placaVeiculo, $tipoVeiculo, $modeloVeiculo);
    }

    ?>

</body>

</html>