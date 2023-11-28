<?php
session_start(); // Inicia a sessão, se ainda não estiver iniciada

// Gera um token CSRF e o armazena na sessão
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Verifica se o formulário foi submetido e o token CSRF é válido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
    // Processa o formulário
    include_once 'DAO/ClienteDAO.php';

    $nomeCliente = $_POST['nomeCliente'];
    $rgCliente = $_POST['rgCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $enderecoCliente = $_POST['enderecoCliente'];

    ClienteDAO::cadastrarCliente($nomeCliente, $rgCliente, $cpfCliente, $enderecoCliente);

    // Limpa o token CSRF após o processamento do formulário
    unset($_SESSION['csrf_token']);
}
?>

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
                        <h2>Cadastro de Cliente</h2>
                        <form action="" method="post">
                            <input type="hidden" name="csrf_token"
                                value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">

                            <div class="mb-3">
                                <fieldset>
                                    <label for="nomeCliente">Nome do Cliente:</label>
                                    <input type="text" id="nomeCliente" name="nomeCliente"
                                        value="<?php echo isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : ''; ?>"
                                        required>
                                </fieldset>
                            </div>

                            <div class="mb-3">
                                <fieldset>
                                    <label for="rgCliente">RG do Cliente:</label>
                                    <input type="text" id="rgCliente" name="rgCliente"
                                        value="<?php echo isset($_POST['rgCliente']) ? $_POST['rgCliente'] : ''; ?>"
                                        oninput="formatRG()" maxlength="12" required>
                                </fieldset>
                            </div>

                            <div class="mb-3">
                                <fieldset>
                                    <label for="cpfCliente">CPF do Cliente:</label>
                                    <input type="text" id="cpfCliente" name="cpfCliente"
                                        value="<?php echo isset($_POST['cpfCliente']) ? $_POST['cpfCliente'] : ''; ?>"
                                        oninput="formatCPF()" maxlength="14" required>
                                </fieldset>
                            </div>

                            <div class="mb-3">
                                <fieldset>
                                    <label for="cep">CEP do Cliente:</label>
                                    <input type="text" id="cep" name="cep"
                                        value="<?php echo isset($_POST['cep']) ? $_POST['cep'] : ''; ?>" required
                                        onblur="getAddressByCEP()" oninput="formatCEP()" maxlength="8">
                                </fieldset>
                            </div>

                            <div class="mb-3">
                                <fieldset>
                                    <label for="enderecoCliente">Endereço do Cliente:</label>
                                    <input type="text" id="enderecoCliente" name="enderecoCliente"
                                        value="<?php echo isset($_POST['enderecoCliente']) ? $_POST['enderecoCliente'] : ''; ?>"
                                        required>
                                </fieldset>
                            </div>

                            <div class="mb-3">
                                <fieldset>
                                    <label for="numeroCliente">Número do Cliente:</label>
                                    <input type="text" id="numeroCliente" name="numeroCliente">
                                </fieldset>
                            </div>
                            <button type="submit" class="btn-moderno" onclick="getAddressByCEP()">Cadastrar
                                Cliente</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <script>


        // Define a função para limpar os campos
        function limparCampos() {
            document.getElementById('nomeCliente').value = '';
            document.getElementById('rgCliente').value = '';
            document.getElementById('cpfCliente').value = '';
            document.getElementById('cep').value = '';
            document.getElementById('enderecoCliente').value = '';
            document.getElementById('numeroCliente').value = '';
        }

        // Chama a função para limpar os campos quando a página é carregada
        window.onload = limparCampos;

        function formatCEP() {
            var cepInput = document.getElementById('cep');
            cepInput.value = maskCEP(cepInput.value.replace(/\D/g, ''));
        }

        function maskCEP(cep) {
            cep = cep.replace(/^(\d{5})(\d)/, '$1-$2'); // Aplica a máscara
            return cep;
        }

        function getAddressByCEP() {
            var cep = document.getElementById('cep').value.replace(/\D/g, ''); // Remove a máscara
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado');
                    } else {
                        document.getElementById('enderecoCliente').value = data.logradouro;
                    }
                })
                .catch(error => {
                    console.error('Erro ao buscar endereço:', error);
                });
        }

        function formatCPF() {
            var cpfInput = document.getElementById('cpfCliente');
            cpfInput.value = cpfInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            cpfInput.value = cpfInput.value.substring(0, 14); // Limita a 14 caracteres
            cpfInput.value = cpfInput.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }

        function formatRG() {
            var rgInput = document.getElementById('rgCliente');
            rgInput.value = rgInput.value.replace(/[^0-9]/g, ''); // Remove caracteres não numéricos
            rgInput.value = rgInput.value.substring(0, 12); // Limita a 12 caracteres
            rgInput.value = rgInput.value.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
        }
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