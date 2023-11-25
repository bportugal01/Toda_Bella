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
    $pontos = PontoEstrategicoDAO::PontosRegioes();
    ?>

    <p>Lista de pontos estratégicos por região</p>

    <table>
        <thead>
            <tr>
                <th>Região</th>
                <th>Ponto Estratégico</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pontos as $ponto): ?>
                <tr>
                    <td>
                        <?= $ponto['NomeRegiao'] ?>
                    </td>
                    <td>
                        <?= $ponto['NomePonto'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>