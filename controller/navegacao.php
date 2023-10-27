<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_GET["login"])){
        include_once "../view/login.php";
    } else if(isset($_GET["registrar"])){
        include_once "../view/registrar.php";
    } else if(isset($_POST["cadUser"])){
        require_once "../controller/usuarioController.php";
        $uCon = new UsuarioController();
        $email = $_POST["emailUsuario"];
        $senha = $_POST["senhaUsuario"]; 
        $nome = $_POST["nomeUsuario"];
        $confirmaSenha = $_POST["senhaUsuarioConfirma"];
        $error_message = "";

        if(!empty($nome) && !empty($email) && !empty($senha)){
            if(strlen($senha) >= 8 && strpos($senha, ' ') === FALSE){
                 if($senha == $confirmaSenha) {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE){
                            $senha = password_hash($_POST["senhaUsuario"], PASSWORD_DEFAULT);
                            $result = $uCon->inserir($nome, $email, $senha);
                            if($result == "sucesso"){
                                include_once "../view/login.php";
                            } else if($result == "emailDuplicado") {
                                $error_message = "emailExistente";
                                include_once "../view/registrar.php";
                            } else {
                                $error_message = "erroInesperado";
                                include_once "../view/registrar.php";
                            }
                        } else {
                            $error_message = "emailInvalido";
                            include_once "../view/registrar.php";
                        }
                    } else {
                        $error_message = "senhasDiferentes";
                        include_once "../view/registrar.php";
                    }
            } else {
                $error_message = "caracteresSenha";
                include_once "../view/registrar.php";
            }
        } else {
            $error_message = "camposVazios";
            include_once "../view/registrar.php";
        }
    } else if(isset($_POST["loginUsuario"])){
        require_once '../controller/usuarioController.php';
        $uCon =  new UsuarioController();
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        if(!empty($email) && !empty($senha) && filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE 
        && strlen($senha) >= 8 && strpos($senha, ' ') === FALSE){
            $result = $uCon->entrar($email, $senha);
            if($result != FALSE){
                $_SESSION['status'] = "logado";
                $_SESSION['usuario'] = $result;
                include_once "../view/principal.php";
            } else {
                $error_message = "incorreto";
                include_once "../view/login.php";
            }
        } else {
            $error_message = "dadosInvalidos";
            include_once "../view/login.php";
        }
        
    } else if(isset($_POST['btnAdicionarCategoria'])) {
        require_once '../controller/categoriaController.php';
        $cCon = new CategoriaController();
        $categoria = $_POST['txtCategoria'];
        $message = "";

        if($categoria != ""){
            $result = $cCon->inserirCategoria($_SESSION['usuario']['id_usuario'], $categoria);
            if($result != FALSE){
                $message = "sucesso";
            } else {
                $message = "erro";
            }
            header('Location: ../controller/navegacao.php?categoriaInsercao=' . $message);
            exit;
        } else {
            $message = "dadosInsuficientes";
            header('Location: ../controller/navegacao.php?categoriaInsercao=' . $message);
        }
    } else if(isset($_GET['categoriaInsercao'])) {
        $message = $_GET['categoriaInsercao'];
        include_once '../view/principal.php';
    } else if(isset($_POST['btnAddItem'])) {
        require_once '../controller/itemController.php';
        $iCon = new ItemController();
        $nomeItem = $_POST['txtNomeItemAdd'];
        $categoria = $_POST['optionCategoriaAdd'];
        $quantidade = $_POST['numQuantidadeAdd'];
        $valor = $_POST['numValorAdd'];
        $descricao = $_POST['txtDescAdd'];
        $data = date("Y-m-d");

        $targetDirectory = "../uploads/";
        $targetFile = $targetDirectory . basename($_FILES["blobImgAdd"]["name"]);
        move_uploaded_file($_FILES["blobImgAdd"]["tmp_name"], $targetFile);
        $imageData = file_get_contents($targetFile);
        $imageData = base64_encode($imageData);
       
        if($nomeItem != "" && $quantidade != "" && $descricao != "" && $data != ""){
            $result = $iCon->inserirItem($_SESSION['usuario']['id_usuario'], $nomeItem, $descricao, $quantidade, $data, $valor, $imageData, $categoria);
            if($result != FALSE){
                $message = "sucesso";
            } else {
                $message = "erro";
            }
            header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
        } else {
            $message = "dadosInsuficientes";
            header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
        }
    } else if(isset($_GET['itemInsercao'])){
        $message = $_GET['itemInsercao'];
        include_once '../view/principal.php';
    } else if(isset($_POST['btnAtualizar'])) {
        require_once '../controller/itemController.php';
        $id_produto = $_POST['btnAtualizar'];
        if($_POST['btnAtualizar'] != "") {
            $iCon = new ItemController();
            $iRes = $iCon->listarItemPorId($_SESSION['usuario']['id_usuario'], $id_produto);
            include_once '../view/atualizar.php';
        }
    } else if(isset($_GET['atualizarVoltar'])) {
        if($_SESSION['usuario']['id_usuario'] != ""){
            header('Location: ../controller/navegacao.php?voltarPrincipal');
        }
    } else if(isset($_GET['voltarPrincipal'])){
        if($_SESSION['usuario']['id_usuario'] != ""){
            include_once '../view/principal.php';
        }
    } else if(isset($_POST['btnItemAtu'])){
        require_once '../controller/itemController.php';
        $id_produto = $_POST['numIdAtu'];
        $nome_produto = $_POST['txtNomeProdutoAtu'];
        $categoria = $_POST['numIdCategoria'];
        $quantidade = $_POST['numQuantidadeAtu'];
        $valor = $_POST['numValorAtu'];
        $descricao = $_POST['txtDescAtu'];

        if($nome_produto != "" && $quantidade != "" && $descricao != ""){
            $iCon = new ItemController();
            $res1 = $iCon->atualizarItem($nome_produto, $descricao, $quantidade, $valor, $categoria, $_SESSION['usuario']['id_usuario'], $id_produto);
            if(isset($_FILES["blobImgAtu"]) && $_FILES["blobImgAtu"]["error"] === UPLOAD_ERR_OK){
                $targetDirectory = "../uploads/";
                $targetFile = $targetDirectory . basename($_FILES["blobImgAtu"]["name"]);
                move_uploaded_file($_FILES["blobImgAtu"]["tmp_name"], $targetFile);
                $imageData = file_get_contents($targetFile);
                $imageData = base64_encode($imageData);
                $res2 = $iCon->atualizarFotoItem($imageData, $_SESSION['usuario']['id_usuario'], $id_produto);
            } else {
                $res2 = TRUE;
            }

            if($res1 == TRUE && $res2 == TRUE){
                $message = "sucesso";
            } else {
                $message = "erro";
            }
            header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
        } else {
            $message = "dadosInsuficientes";
            header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
        }
    } else if(isset($_POST['btnVisualizar'])){
        if($_SESSION['usuario']['id_usuario'] != ""){
            require_once '../controller/itemController.php';
            $iCon = new ItemController();
            $iRes = $iCon->listarItemPorId($_SESSION['usuario']['id_usuario'], $_POST['btnVisualizar']);
            if($iRes != ""){
                include_once '../view/visualizar.php';
            } else {
                $message = "dadosInsuficientes";
                header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
            }
        } else {
            header('Location: ../view/index.php');
        }
    } else if(isset($_POST['btnExcluir'])) {
        $id_produto = $_POST['btnExcluir'];
        require_once '../controller/itemController.php';
        $iCon = new ItemController();
        if($iCon->removerItem($id_produto, $_SESSION['usuario']['id_usuario']) != FALSE){
            $message = "sucesso";
        } else {
            $message = "erro";
        }
        header('Location: ../controller/navegacao.php?itemInsercao=' . $message);
    } else {
        include_once "../view/index.php";
    }

?>
