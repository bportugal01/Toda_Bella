<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include_once 'DAO/ProdutoDAO.php';

    if (isset($_POST['nomeProduto'])) {
        $nomeProduto = $_POST['nomeProduto'];
        $produtos = ProdutoDAO::listarVendedoresPorNomeProduto($nomeProduto);
    }
    ?>

    <form method="post" action="">
        <label for="nomeProduto">Digite o nome do produto:</label>
        <input type="text" name="nomeProduto" id="nomeProduto" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($produtos)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Produto</th>
                    <th>Nome Vendedor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td>
                            <?= $produto['NomeProduto'] ?>
                        </td>
                        <td>
                            <?= $produto['NomeVendedor'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>