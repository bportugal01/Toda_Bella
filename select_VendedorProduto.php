<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'DAO/VendedorDAO.php';

    if (isset($_POST['nomeVendedor'])) {
        $nomeVendedor = $_POST['nomeVendedor'];
        $vendedores = VendedorDAO::listarProdutosPorVendedor($nomeVendedor);
    }
    ?>

    <form method="post" action="">
        <label for="nomeVendedor">Digite o nome do vendedor:</label>
        <input type="text" name="nomeVendedor" id="nomeVendedor" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($vendedores)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Vendedor</th>
                    <th>Nome Produto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vendedores as $vendedor): ?>
                    <tr>
                        <td>
                            <?= $vendedor['NomeVendedor'] ?>
                        </td>
                        <td>
                            <?= $vendedor['NomeProduto'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>