<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'DAO/NotaFiscalDAO.php';

    $notasFiscais = NotaFiscalDAO::listarQuantidadeItensNotaFiscal();
    ?>
    <table>
        <thead>
            <tr>
                <th>Código Nota Fiscal</th>
                <th>Quantidade de Itens</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notasFiscais as $notaFiscal) : ?>
                <tr>
                    <td><?= $notaFiscal['CodigoNotaFiscal'] ?></td>
                    <td><?= $notaFiscal['QuantidadeItens'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</body>

</html>