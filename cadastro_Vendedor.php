<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendedor</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>

<body>
    <h2>Cadastro de Vendedor</h2>
    <form action="" method="post">
        <label for="nomeVendedor">Nome do Vendedor:</label>
        <input type="text" id="nomeVendedor" name="nomeVendedor" required>

        <label for="rgVendedor">RG do Vendedor:</label>
        <input type="text" id="rgVendedor" name="rgVendedor" required>

        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" id="dataNascimento" name="dataNascimento" required>

        <label for="telefoneVendedor">Telefone do Vendedor:</label>
        <input type="tel" id="telefoneVendedor" name="telefoneVendedor" required>

        <label for="codigoRegiao">Código da Região:</label>
        <!-- Aqui, você pode carregar dinamicamente as opções de região do banco de dados -->
        <input type="number" id="codigoRegiao" name="codigoRegiao" required>

        <button type="submit">Cadastrar Vendedor</button>
    </form>
    <div class="view-regioes-container">
                <h2>Visualizar Todas as Regiões Cadastradas</h2>
                <!-- Adicione um botão para acionar a visualização das regiões -->
                <button id="btnViewRegioes" onclick="viewRegioes()">Ver Regiões Cadastradas</button>

                <!-- Div para exibir as regiões -->
                <div id="regioesList"></div>
            </div>
    <?php
    include_once 'DAO/VendedorDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $codigoRegiao = $_POST['codigoRegiao'];
        $nomeVendedor = $_POST['nomeVendedor'];
        $rgVendedor = $_POST['rgVendedor'];
        $dataNascimento = $_POST['dataNascimento'];
        $telefoneVendedor = $_POST['telefoneVendedor'];

        VendedorDAO::cadastrarVendedor($codigoRegiao, $nomeVendedor, $rgVendedor, $dataNascimento, $telefoneVendedor);
    }

    $vendedores = VendedorDAO::listarVendedores();
    ?>

    <h2>Listagem de Vendedores</h2>
    <ul>
        <?php foreach ($vendedores as $vendedor): ?>
            <li>
                <?= "{$vendedor['NomeVendedor']} - {$vendedor['RGVendedor']} - {$vendedor['TelefoneVendedor']}"; ?>
                <a href='excluirVendedor.php?codigo=<?= $vendedor['CodigoVendedor'] ?>'>Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- Adicione seus scripts JavaScript aqui -->

    <script>
       function viewRegioes() {
            // Use AJAX para buscar as regiões do servidor
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Atualiza a div com as regiões retornadas pelo servidor
                    document.getElementById("regioesList").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "regioes.php", true);
            xhr.send();
        }
    </script>
</body>

</html>