
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    <h2>Cadastro de Produto</h2>
    <form action="" method="post">
        <label for="codigoProduto">Código do Produto:</label>
        <input type="text" id="codigoProduto" name="codigoProduto" required>

        <label for="nomeProduto">Nome do Produto:</label>
        <input type="text" id="nomeProduto" name="nomeProduto" required>

        <label for="situacao">Situação:</label>
        <input type="text" id="situacao" name="situacao" required>

        <label for="precoUnitario">Preço Unitário:</label>
        <input type="number" id="precoUnitario" name="precoUnitario" required>

        <label for="quantidadeEstoque">Quantidade em Estoque:</label>
        <input type="number" id="quantidadeEstoque" name="quantidadeEstoque" required>

        <button type="submit">Cadastrar Produto</button>
    </form>
    
    <?php
    include_once 'DAO/ProdutoDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoProduto = $_POST['codigoProduto'];
        $nomeProduto = $_POST['nomeProduto'];
        $situacao = $_POST['situacao'];
        $precoUnitario = $_POST['precoUnitario'];
        $quantidadeEstoque = $_POST['quantidadeEstoque'];

        ProdutoDAO::cadastrarProduto($codigoProduto, $nomeProduto, $situacao, $precoUnitario, $quantidadeEstoque);
    }

    ?>

    
    
</body>

</html>
