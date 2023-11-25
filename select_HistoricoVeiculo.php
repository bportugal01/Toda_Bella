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

    // Verifique se o parâmetro placaVeiculo está definido na URL
    if (isset($_GET['placaVeiculo'])) {
        // Atribua o valor do parâmetro placaVeiculo à variável $placaVeiculo
        $placaVeiculo = $_GET['placaVeiculo'];

        // Chame a função para obter o histórico de utilização do veículo
        $historicoVeiculo = VeiculoDAO::listarHistoricoUtilizacao($placaVeiculo);
        ?>
        <form method="get" action="">
            <label for="placaVeiculo">Digite a placa do veículo:</label>
            <input type="text" name="placaVeiculo" id="placaVeiculo" required>
            <button type="submit">Buscar</button>
        </form>

        <?php if (isset($historicoVeiculo)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Placa Veículo</th>
                        <th>Nome Vendedor</th>
                        <th>Data Utilização</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historicoVeiculo as $veiculo): ?>
                        <tr>
                            <td>
                                <?= $veiculo['PlacaVeiculo'] ?>
                            </td>
                            <td>
                                <?= $veiculo['NomeVendedor'] ?>
                            </td>
                            <td>
                                <?= $veiculo['DataUtilizacao'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum histórico encontrado para a placa do veículo:
                <?= $placaVeiculo ?>
            </p>
        <?php endif; ?>
    <?php } ?>

</body>

</html>