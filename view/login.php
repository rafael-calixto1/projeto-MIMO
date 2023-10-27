<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MIMO - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/login-style.css">
</head>

<body>
    <?php
    if (isset($error_message)) {
        $print = FALSE;
        if ($error_message == "dadosInvalidos") {
            $error_message = "DADOS INVÁLIDOS";
            $print = TRUE;
        } else if ($error_message == "incorreto") {
            $error_message = "EMAIL E/OU SENHA INCORRETOS";
            $print = TRUE;
        }

        if ($print == TRUE) {
            echo    '<div class="error-message">
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                        <span>' . $error_message . '</span>
                    </div>';
        }
    }
    ?>

    <div class="body-background"></div>

    <div class="form-container">
        <a href="../controller/navegacao.php">
            <img src="../view/images/logo.png">
        </a>
        <div class="container mt-4">
            <div class="row align-items-center">
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounder-3" style="background-color: white;" method="post" action="../controller/navegacao.php">
                        <h4>
                            Entrar
                        </h4>
                        <div class="form-floating mb-3">
                            <input autocomplete="off" name="email" type="email" class="form-control" id="inputEmail" placeholder="E-mail" required />
                            <label form="inputEmail">E-mail </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input autocomplete="off" name="senha" type="Password" class="form-control" id="inputPassord" placeholder="Senha" required />
                            <label form="inputPassord">Senha </label>
                        </div>
                        <div class="login-button-container">
                            <button class="btn btn-lg btn-success" type="submit" name="loginUsuario"> Entrar</button>
                            <span>Não cadastrado?</span>
                            <a href="../controller/navegacao.php?registrar"> <span>Registrar-se</span></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>