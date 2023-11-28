<?php
session_start(); // Inicia a sessão, se ainda não estiver iniciada

// Gera um token CSRF e o armazena na sessão
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include_once 'DAO/VeiculoDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    $codigoVeiculo = $_POST['codigoVeiculo'];
    $placaVeiculo = $_POST['placaVeiculo'];
    $tipoVeiculo = $_POST['tipoVeiculo'];
    $modeloVeiculo = $_POST['modeloVeiculo'];

    VeiculoDAO::cadastrarVeiculo($codigoVeiculo, $placaVeiculo, $tipoVeiculo, $modeloVeiculo);
    // Limpa o token CSRF após o processamento do formulário
    unset($_SESSION['csrf_token']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Veiculo</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">




    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">


    <style>
        /* Adicione este código ao seu arquivo de estilo CSS */
        .logo {
            align-items: center;
        }



        .logo img {
            max-height: 80px;
            /* Ajuste a altura máxima conforme necessário */
            max-width: 100%;
            /* Garante que o logo não ultrapasse o contêiner */
            margin-right: 10px;
            /* Espaçamento entre o logo e o texto (se houver) */

        }
    </style>
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <header class="header-area header-sticky sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="gerenciamento.php" class="logo">
                            <img src="assets/images/logo20.png">
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
                        <h2>Cadastro de Veiculo</h2>
                        <form action="" method="post">

                            <input type="hidden" name="csrf_token"
                                value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                            <div class="mb-3">
                                <fieldset>
                                    <label for="codigoVeiculo">Código do Veiculo:</label>
                                    <input type="text" id="codigoVeiculo" name="codigoVeiculo" required>
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset>
                                    <label for="placaVeiculo">Placa do Veiculo:</label>
                                    <input type="text" id="placaVeiculo" name="placaVeiculo" required>
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset>
                                    <label for="tipoVeiculo">Tipo do Veiculo:</label>
                                    <input type="text" id="tipoVeiculo" name="tipoVeiculo" required>
                                </fieldset>
                            </div>
                            <div class="mb-3">
                                <fieldset>
                                    <label for="modeloVeiculo">Modelo do Veiculo:</label>
                                    <input type="text" id="modeloVeiculo" name="modeloVeiculo" required>
                                </fieldset>
                            </div>

                            <button type="submit">Cadastrar Veiculo</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Define a função para limpar os campos
        function limparCampos() {
            document.getElementById('codigoVeiculo').value = '';
            document.getElementById('placaVeiculo').value = '';
            document.getElementById('tipoVeiculo').value = '';
            document.getElementById('modeloVeiculo').value = '';
        }

        // Chama a função para limpar os campos quando a página é carregada
        window.onload = limparCampos;
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>

</body>

</html>