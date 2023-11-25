<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'DAO/VeiculoDAO.php';

    $vendedoresVeiculo = VeiculoDAO::listarVendedoresVeiculosUltimoMes();  // Corrigindo o nome da variável
    ?>
    <h2>Listagem de Vendedores e Veículos</h2>
    <table>
        <tr>
            <th>Código do Vendedor</th>
            <th>Nome do Vendedor</th>
            <th>Código do Veículo</th>
            <th>Placa do Veículo</th>
            <th>Tipo do Veículo</th>
            <th>Modelo do Veículo</th>
        </tr>
        <?php foreach ($vendedoresVeiculo as $vendedorVeiculo): ?>
            <tr>
                <td>
                    <?= $vendedorVeiculo['CodigoVendedor']; ?>
                </td>
                <td>
                    <?= $vendedorVeiculo['NomeVendedor']; ?>
                </td>
                <td>
                    <?= $vendedorVeiculo['CodigoVeiculo']; ?>
                </td>
                <td>
                    <?= $vendedorVeiculo['PlacaVeiculo']; ?>
                </td>
                <td>
                    <?= $vendedorVeiculo['TipoVeiculo']; ?>
                </td>
                <td>
                    <?= $vendedorVeiculo['ModeloVeiculo']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
</body>

</html>