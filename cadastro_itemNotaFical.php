<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Item Nota Fiscal</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    
    <h2>Cadastro de Item Nota Fiscal</h2>
    <form action="" method="post">
        <label for="numeroItemNotaFiscal">Número do Item da Nota Fiscal:</label>
        <input type="text" id="numeroItemNotaFiscal" name="numeroItemNotaFiscal" required>

        <label for="codigoProduto">Código do Produto:</label>
        <input type="text" id="codigoProduto" name="codigoProduto" required>

        <label for="codigoNotaFiscal">Código da Nota Fiscal:</label>
        <input type="text" id="codigoNotaFiscal" name="codigoNotaFiscal" required>

        <label for="quantidadeProduto">Quantidade do Produto:</label>
        <input type="text" id="quantidadeProduto" name="quantidadeProduto" required>

        <button type="submit">Cadastrar Item Nota Fiscal</button>
    </form>
    <?php
    include_once 'DAO/ItemNotaFiscalDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numeroItemNotaFiscal = $_POST['numeroItemNotaFiscal'];
        $codigoProduto = $_POST['codigoProduto'];
        $codigoNotaFiscal = $_POST['codigoNotaFiscal'];
        $quantidadeProduto = $_POST['quantidadeProduto'];

        
        $itemNotaFiscalDAO = new ItemNotaFiscalDAO();
        $itemNotaFiscalDAO->cadastrarItemNotaFiscal($numeroItemNotaFiscal, $codigoProduto, $codigoNotaFiscal, $quantidadeProduto);
    }
    ?>
</body>

</html>
