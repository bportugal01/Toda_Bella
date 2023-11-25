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
    include_once 'DAO/VendedorDAO.php';
    $vendedores = VendedorDAO::listarVendedores();
    ?>

    <h2>Listagem de Vendedores</h2>

    <table>
        <tr>
            <th>Código do Vendedor</th>
            <th>Código da Região</th>
            <th>Nome do Vendedor</th>
            <th>RG do Vendedor</th>
            <th>Data de Nascimento</th>
            <th>Telefone do Vendedor</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vendedores as $vendedor) : ?>
            <tr>
                <td>
                    <?= $vendedor['CodigoVendedor']; ?>
                </td>
                <td>
                    <?= $vendedor['CodigoRegiao']; ?>
                </td>
                <td>
                    <?= $vendedor['NomeVendedor']; ?>
                </td>
                <td>
                    <?= $vendedor['RGVendedor']; ?>
                </td>
                <td>
                    <?= $vendedor['DataNascimento']; ?>
                </td>
                <td>
                    <?= $vendedor['TelefoneVendedor']; ?>
                </td>
                <td>
                    <a href='excluirVendedor.php?codigo=<?= $vendedor['CodigoVendedor'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>


</body>

</html>