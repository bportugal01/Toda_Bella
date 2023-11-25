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
    include_once 'DAO/NotaFiscalDAO.php';
    $NotaFiscal = NotaFiscalDAO::listarNotasFiscais();

?>
<h2>Listagem de Notas Fiscais</h2>

<table>
    <tr>
        <th>Código da Nota Fiscal</th>
        <th>Código do Cliente</th>
        <th>Código do Veiculo</th>
        <th>Data da Nota Fiscal</th>
        <th>Valor da Nota Fiscal</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($NotaFiscal as $notaFiscal): ?>
        <tr>
            <td>
                <?= $notaFiscal['CodigoNotaFiscal']; ?>
            </td>
            <td>
                <?= $notaFiscal['NumeroNotaFiscal']; ?>
            </td>
            <td>
                <?= $notaFiscal['CodigoCliente']; ?>
            </td>
            <td>
                <?= $notaFiscal['CodigoVendedor']; ?>
            </td>
            <td>
                <?= $notaFiscal['DataEmissao']; ?>
            </td>
            <td>
                <a href='excluirNotaFiscal.php?codigo=<?= $notaFiscal['CodigoNotaFiscal'] ?>'>Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

   
   

    
</body>
</html>