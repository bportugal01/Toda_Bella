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
    include_once 'DAO/ProdutoDAO.php';
    $Produtos = ProdutoDAO::listarProdutos();

?>
    <h2>Listagem de Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>Código do Produto</th>
                <th>Nome do Produto</th>
                <th>Situação</th>
                <th>Preço Unitário</th>
                <th>Quantidade em Estoque</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Produtos as $Produto) : ?>
                <tr>
                    <td><?= $Produto['CodigoProduto'] ?></td>
                    <td><?= $Produto['NomeProduto'] ?></td>
                    <td><?= $Produto['SituacaoProduto'] ?></td>
                    <td><?= $Produto['PrecoUnitario'] ?></td>
                    <td><?= $Produto['QuantidadeEstoque'] ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="codigoProduto" value="<?= $Produto['CodigoProduto'] ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoProduto = $_POST['codigoProduto'];
        ProdutoDAO::excluirProduto($codigoProduto);
    }
    ?>
    
</body>
</html>