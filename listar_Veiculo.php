<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veiculo</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">




    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.js"></script>
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.2.5.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="assets/css/css.css">
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

                        <div id="wrapper">

                            <?php
                            // Agora, após o possível cadastro, lista os pontos estratégicos
                            include_once 'DAO/VeiculoDAO.php';
                            include_once 'DAO/UtilizacaoVeiculoDAO.php';
                            $Veiculos = VeiculoDAO::listarVeiculos();
                            $UtilizacaoVeiculos = UtilizacaoVeiculoDAO::listarUtilizacoesVeiculo();

                            ?>
                            <h2>Listagem de Veículos</h2>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Código do Veículo</th>
                                        <th>Placa do Veículo</th>
                                        <th>Tipo do Veículo</th>
                                        <th>Modelo do Veículo</th>
                                     
                                    </tr>
                                </thead>
                                <?php foreach ($Veiculos as $Veiculo): ?>
                                    <tr>
                                        <td data-label="Código do Veiculo">
                                            <?= $Veiculo['CodigoVeiculo']; ?>
                                        </td>
                                        <td data-label="Placa do Veiculp">
                                            <?= $Veiculo['PlacaVeiculo']; ?>
                                        </td>
                                        <td data-label="Tipo do Veiculo">
                                            <?= $Veiculo['TipoVeiculo']; ?>
                                        </td>
                                        <td data-label="Modelo do Veiculo">
                                            <?= $Veiculo['ModeloVeiculo']; ?>
                                        </td>

                                       
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                            <h2>Listagem de Utilização de Veículos</h2>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Código da Veículo</th>
                                        <th>Código do Vendedor</th>
                                        <th>Data De Utilização</th>

                                    </tr>
                                </thead>
                                <?php foreach ($UtilizacaoVeiculos as $UtilizacaoVeiculo): ?>
                                    <tr>
                                        <td data-label="Codigo do Veiculo">
                                            <?= $UtilizacaoVeiculo['CodigoVeiculo']; ?>
                                        </td>
                                        <td data-label="Codigo do Vendedor">
                                            <?= $UtilizacaoVeiculo['CodigoVendedor']; ?>
                                        </td>
                                        <td data-label="Data de Utilização">
                                            <?= $UtilizacaoVeiculo['DataUtilizacao']; ?>
                                        </td>
                                      
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


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
</body>

</html>