<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/registrar-style.css">
    <title>MIMO - Registrar</title>
</head>

<body>
    <?php
    if (isset($error_message)) {
        $print = FALSE;
        if ($error_message == "senhasDiferentes") {
            $error_message = "SENHAS DIFERENTES";
            $print = TRUE;
        } else if ($error_message == "camposVazios") {
            $error_message = "PREENCHA OS CAMPOS";
            $print = TRUE;
        } else if ($error_message == "emailInvalido") {
            $error_message = "EMAIL INVÁLIDO";
            $print = TRUE;
        } else if ($error_message == "caracteresSenha") {
            $error_message = "FORMATO OU TAMANHO DE SENHA INVÁLIDO";
            $print = TRUE;
        } else if ($error_message == "emailExistente") {
            $error_message = "O EMAIL JÁ ESTÁ CADASTRADO";
            $print = TRUE;
        } else if ($error_message == "erroInesperado") {
            $error_message = "ERRO INESPERADO - CONTATAR ADMIN";
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

    <div class="body-div">
        <div class="left-column">
            <a href="../controller/navegacao.php?">
                <div class="logo-container">
                    <img src="../view/images/logo.png">
                </div>
            </a>
            <h2>
                Registrar-se
            </h2>
            <div class="form-container">
                <form method="post" action="../controller/navegacao.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome Completo</label>
                        <input autocomplete="off" type="text" class="form-control" aria-describedby="" name="nomeUsuario" placeholder="Insira o nome completo..." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input autocomplete="off" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="emailUsuario" placeholder="Insira o email..." required>
                        <small id="emailHelp" class="form-text text-muted">Seu e-mail está seguro conosco.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input autocomplete="off" type="password" class="form-control" id="senha" name="senhaUsuario" placeholder="Insira a senha..." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input autocomplete="off" type="password" class="form-control" id="senhaConfirma" name="senhaUsuarioConfirma" placeholder="Confirme a senha..." required>
                    </div>
                    <button type="submit" name="cadUser" class="btn btn-primary" style="width:100%;">CADASTRAR</button>
                </form>
            </div>
            <h5 class="text-center">
                JÁ POSSUI CONTA?
            </h5>
            <a href="../controller/navegacao.php?login">
                <p class="text-center">FAÇA LOGIN</p>
            </a>
        </div>
        <div class="right-column">
            <div class="background-right"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>