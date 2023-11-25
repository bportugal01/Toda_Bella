<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'DAO/RegiaoDAO.php';

    $vendedoreRegiao = RegiaoDAO::listarVendedoresPorRegiao();  // Corrigindo o nome da variável
    ?>
    <h2>Listagem de Vendedores e Regiões</h2>
    <table>
        <tr>
            <th>Nome da Região</th>
            <th>Nome do Vendedor</th>
        </tr>
        <?php foreach ($vendedoreRegiao as $vendedorRegiao): ?>
            <tr>
                <td>
                    <?= $vendedorRegiao['NomeRegiao']; ?>
                </td>
                <td>
                    <?= $vendedorRegiao['NomeVendedor']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
</body>

</html>