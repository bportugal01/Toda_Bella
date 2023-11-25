<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    // Agora, após o possível cadastro, lista os pontos estratégicos
    include_once 'DAO/VeiculoDAO.php';
    include_once 'DAO/UtilizacaoVeiculoDAO.php';
    $Veiculos = VeiculoDAO::listarVeiculos();
    $UtilizacaoVeiculos = UtilizacaoVeiculoDAO::listarUtilizacoesVeiculo();

    ?>
    <h2>Listagem de Veículos</h2>

    <table>
        <tr>
            <th>Código do Veículo</th>
            <th>Placa do Veículo</th>
            <th>Modelo do Veículo</th>
            <th>Marca do Veículo</th>
            <th>Cor do Veículo</th>
            <th>Chassi do Veículo</th>
            <th>Renavam do Veículo</th>
            <th>Capacidade do Veículo</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($Veiculos as $Veiculo): ?>
            <tr>
                <td>
                    <?= $Veiculo['CodigoVeiculo']; ?>
                </td>
                <td>
                    <?= $Veiculo['PlacaVeiculo']; ?>
                </td>
                <td>
                    <?= $Veiculo['TipoVeiculo']; ?>
                </td>
                <td>
                    <?= $Veiculo['ModeloVeiculo']; ?>
                </td>

                <td>
                    <a href='excluirVeiculo.php?codigo=<?= $Veiculo['CodigoVeiculo'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Listagem de Utilização de Veículos</h2>

    <table>
        <tr>
            <th>Código da Veículo</th>
            <th>Código do Vendedor</th>
            <th>Data De Utilização</th>

            <th>Ações</th>
        </tr>
        <?php foreach ($UtilizacaoVeiculos as $UtilizacaoVeiculo): ?>
            <tr>
                <td>
                    <?= $UtilizacaoVeiculo['CodigoVeiculo']; ?>
                </td>
                <td>
                    <?= $UtilizacaoVeiculo['CodigoVendedor']; ?>
                </td>
                <td>
                    <?= $UtilizacaoVeiculo['DataUtilizacao']; ?>
                </td>
            
                <td>
                    <a href='excluirUtilizacaoVeiculo.php?codigo=<?= $UtilizacaoVeiculo['CodigoUtilizacao'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
</body>

</html>