<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Região e Pontos Estratégicos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Cadastro de Ponto Estratégico</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="pontoNome">Nome do Ponto Estratégico:</label>
            <input type="text" id="pontoNome" name="pontoNome" required>

            <label for="regiaoId">Região:</label>
            <input type="text" id="regiaoId" name="regiaoId" required>

            <button type="submit" name="submitForm">Cadastrar Ponto Estratégico</button>
        </form>

        <?php
        include_once 'DAO/PontoEstratagicoDAO.php';
        include_once 'DAO/RegiaoDAO.php';

        // Verifica se o formulário foi submetido
        if (isset($_POST['submitForm'])) {
            if (isset($_POST['pontoNome']) && isset($_POST['regiaoId'])) {
                $pontoNome = htmlspecialchars($_POST['pontoNome']); // Evita XSS
                $regiaoId = htmlspecialchars($_POST['regiaoId']); // Garante que seja um número inteiro
        
                // Evita SQL injection usando prepared statements
                PontoEstrategicoDAO::adicionarPontoEstrategico($pontoNome, $regiaoId);

                // Redireciona para evitar o reenvio do formulário
                header("Location: {$_SERVER['PHP_SELF']}");
                exit();
            } else {
                echo "Os campos não foram preenchidos corretamente.";
            }
        }

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
                    <td><?= $ponto['CodigoPonto']; ?></td>
                    <td><?= $ponto['NomePonto']; ?></td>
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
                    <td><?= $regiao['CodigoRegiao']; ?></td>
                    <td><?= $regiao['NomeRegiao']; ?></td>
                    <td>
                        <a href='excluirRegiao.php?codigo=<?= $regiao['CodigoRegiao'] ?>'>Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>
