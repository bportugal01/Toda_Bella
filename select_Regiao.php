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
    $regioes = RegiaoDAO::listarRegioes();  // Corrigindo o nome da variável
    ?>
    <h2>Listagem de Regiões</h2>
    <table>
        <tr>
            <th>Código da Região</th>
            <th>Nome da Região</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($regioes as $regiao): ?>
            <tr>
                <td>
                    <?= $regiao['CodigoRegiao']; ?>
                </td>
                <td>
                    <?= $regiao['NomeRegiao']; ?>
                </td>
                <td>
                    <a href='excluirRegiao.php?codigo=<?= $regiao['CodigoRegiao'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

</body>

</html>