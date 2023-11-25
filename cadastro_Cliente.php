<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <!-- Adicione seus estilos CSS aqui -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">




    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>
    <header class="header-area header-sticky sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="gerenciamento.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Cadastro</a>
                                <ul>
                                    <li><a href="cadastro_Cliente.php">Cadastro de Cliente</a></li>
                                    <li><a href="cadastro_itemNotaFical.php">Cadastro de Item Nota Fiscal</a></li>
                                    <li><a href="cadastro_NotaFiscal.php">Cadastro de Nota Fiscal</a></li>
                                    <li><a href="cadastro_Produto.php">Cadastro de Produto</a></li>
                                    <li><a href="cadastro_Regiao_Ponto.php">Cadastro de Região Ponto</a></li>
                                    <li><a href="cadastro_Veiculo.php">Cadastro de Veículo</a></li>
                                    <li><a href="cadastro_Vendedor.php">Cadastro de Vendedor</a></li>
                                    <li><a href="cadatro_UtilizacaoVeiculo.php">Cadastro de Utilização de Veículo</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Listagem</a>
                                <ul>
                                    <li><a href="listar_Cliente.php">Listar de Cliente</a></li>
                                    <li><a href="listar_NotaFiscal.php">Listar de Nota Fiscal</a></li>
                                    <li><a href="listar_Produto.php">Listar de Produto</a></li>
                                    <li><a href="listar_RegiaoPonto.php">Listar de Região Ponto</a></li>
                                    <li><a href="listar_Veiculo.php">Listar de Veículo</a></li>
                                    <li><a href="listar_Vendedor.php">Listar de Vendedor</a></li>
                                </ul>
                            </li>
                            <li><a href="select.php">Pesquisas detalhadas</a></li>
                            <li><a href="sair.php">Sair</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <br>
    <div class="subscribe">
        <div class="container">
            <div class="row justify-content-center">
                <div class="border p-4">
                    <div class="section-heading">
                        <h2>Cadastro de Cliente</h2>
                        <form action="" method="post">
                            <div class="mb-3">
                                <fieldset>
                                    <label for="codigoCliente">Código do Cliente:</label>
                                    <input type="text" id="codigoCliente" name="codigoCliente" required>
                                </fieldset>
                            </div>

                            <label for="nomeCliente">Nome do Cliente:</label>
                            <input type="text" id="nomeCliente" name="nomeCliente" required>

                            <label for="rgCliente">RG do Cliente:</label>
                            <input type="text" id="rgCliente" name="rgCliente" required>

                            <label for="cpfCliente">CPF do Cliente:</label>
                            <input type="text" id="cpfCliente" name="cpfCliente" required>

                            <label for="enderecoCliente">Endereço do Cliente:</label>
                            <input type="text" id="enderecoCliente" name="enderecoCliente" required>

                            <button type="submit">Cadastrar Cliente</button>
                        </form>
                        <?php
                        include_once 'DAO/ClienteDAO.php';

                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $codigoCliente = $_POST['codigoCliente'];
                            $nomeCliente = $_POST['nomeCliente'];
                            $rgCliente = $_POST['rgCliente'];
                            $cpfCliente = $_POST['cpfCliente'];
                            $enderecoCliente = $_POST['enderecoCliente'];

                            ClienteDAO::cadastrarCliente($codigoCliente, $nomeCliente, $rgCliente, $cpfCliente, $enderecoCliente);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


</body>

</html>