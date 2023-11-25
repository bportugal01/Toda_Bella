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

    $produtosNao = ProdutoDAO::listarProdutosNaoVendidos();  // Corrigindo o nome da variável
    ?>
    <h2>Listagem de Produtos Não Vendidos</h2>

    <table>
        <tr>
            <th>Código do Produto</th>
            <th>Nome do Produto</th>
            <th>Preço do Produto</th>
            <th>Quantidade do Produto</th>
            <th>Descrição do Produto</th>
        </tr>
        <?php foreach ($produtosNao as $produtoNao): ?>
            <tr>
                <td>
                    <?= $produtoNao['CodigoProduto']; ?>
                </td>
                <td>
                    <?= $produtoNao['NomeProduto']; ?>
                </td>
                <td>
                    <?= $produtoNao['PrecoUnitario']; ?>
                </td>
                <td>
                    <?= $produtoNao['QuantidadeEstoque']; ?>
                </td>
                <td>
                    <?= $produtoNao['SituacaoProduto']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    
</body>
</html>