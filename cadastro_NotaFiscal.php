<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Nota Fiscal</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    <h2>Cadastro de Nota Fiscal</h2>
    <form action="" method="post">
        <label for="codigoNotaFiscal">Código da Nota Fiscal:</label>
        <input type="text" id="codigoNotaFiscal" name="codigoNotaFiscal" required>

        <label for="numeroNotaFiscal">Número da Nota Fiscal:</label>
        <input type="text" id="numeroNotaFiscal" name="numeroNotaFiscal" required>

        <label for="codigoCliente">Código do Cliente:</label>
        <input type="text" id="codigoCliente" name="codigoCliente" required>

        <label for="codigoVendedor">Código do Vendedor:</label>
        <input type="text" id="codigoVendedor" name="codigoVendedor" required>

        <label for="dataEmissao">Data de Emissão:</label>
        <input type="date" id="dataEmissao" name="dataEmissao" required>

        <button type="submit">Cadastrar Nota Fiscal</button>
    </form>

    <?php
    include_once 'DAO/NotaFiscalDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoNotaFiscal = $_POST['codigoNotaFiscal'];
        $numeroNotaFiscal = $_POST['numeroNotaFiscal'];
        $codigoCliente = $_POST['codigoCliente'];
        $codigoVendedor = $_POST['codigoVendedor'];
        $dataEmissao = $_POST['dataEmissao'];

        NotaFiscalDAO::cadastrarNotaFiscal($codigoNotaFiscal, $numeroNotaFiscal, $codigoCliente, $codigoVendedor, $dataEmissao);
    }

    ?>
</body>

</html>