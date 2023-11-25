<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include_once 'DAO/PontoEstratagicoDAO.php';
    include_once 'DAO/RegiaoDAO.php';


    // Agora, após o possível cadastro, lista os pontos estratégicos
    $pontosEstrategicos = PontoEstrategicoDAO::listarPontosEstrategicos();
    $regioes = RegiaoDAO::listarRegioes();  // Corrigindo o nome da variável
    ?>

    <h2>Listagem de Pontos Estratégicos</h2>
    <table>
        <tr>
            <th>Código do Ponto Estratégico</th>
            <th>Nome do Ponto Estratégico</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($pontosEstrategicos as $ponto): ?>
            <tr>
                <td>
                    <?= $ponto['CodigoPonto']; ?>
                </td>
                <td>
                    <?= $ponto['NomePonto']; ?>
                </td>
                <td>
                    <a href='excluirPontoEstrategico.php?codigo=<?= $ponto['CodigoPonto'] ?>'>Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

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
    </table>
    </div>
</body>

</html>