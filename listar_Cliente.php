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
    include_once 'DAO/ClienteDAO.php';
    $clientes = ClienteDAO::listarClientes();
    ?>

    <h2>Listagem de Clientes</h2>
    <table>
        <tr>
            <th>Código do Cliente</th>
            <th>Nome do Cliente</th>
            <th>RG do Cliente</th>
            <th>CPF do Cliente</th>
            <th>Endereço do Cliente</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td>
                    <?= $cliente['CodigoCliente']; ?>
                </td>
                <td>
                    <?= $cliente['NomeCliente']; ?>
                </td>
                <td>
                    <?= $cliente['RGCliente']; ?>
                </td>
                <td>
                    <?= $cliente['CPFCliente']; ?>
                </td>
                <td>
                    <?= $cliente['EnderecoCliente']; ?>
                </td>
                <td>
                    <a href='excluirCliente.php?codigo=<?= $cliente['CodigoCliente'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>