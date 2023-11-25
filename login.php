<?php
include_once 'DAO/UserDAO.php';

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Verifica se os campos estão vazios
    if (empty($email) || empty($senha)) {
        $erroLogin = "Por favor, preencha todos os campos.";
    } else {
        // Chama o método de login
        if (UserDAO::login($email, $senha)) {
            // Login bem-sucedido, redireciona para a página desejada
            header("Location: gerenciamento.php");
            exit();
        } else {
            // Exibe mensagem de erro no login
            $erroLogin = "Credenciais inválidas. Tente novamente.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Hexashop Ecommerce HTML CSS Template</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>

<body>
    <div class="subscribe">
        <div class="container">
            <div class="row justify-content-center">
                <div class="border p-4">
                    <div class="section-heading">
                        <h2>Login</h2>
                        <span>Details to details are what make Hexashop different from the other themes.</span>
                    </div>
                    <form id="subscribe" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <?php if (isset($erroLogin)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $erroLogin; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <fieldset>
                                <input name="email" type="text" id="email" class="form-control" pattern="[^ @]*@[^ @]*"
                                    placeholder="Your Email Address" required="">
                            </fieldset>
                        </div>
                        <div class="mb-3">
                            <fieldset>
                                <input name="senha" type="password" id="senha" class="form-control"
                                    placeholder="Your Password" required="">
                            </fieldset>
                        </div>
                        <div>
                            <button type="submit" id="form-submit" class="btn btn-dark w-100">
                                Entrar
                            </button>
                        </div>



                    </form>

                    <div class="text-center mt-3">
                        <p>"Área exclusiva para administradores"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- *-->

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
```