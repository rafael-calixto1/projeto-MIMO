<?php
    if(!isset($_SESSION)){
        session_start();

        if($_SESSION["status"] != "logado"){
            echo $_SESSION['status'] = "naoLogado";
        }
    }

    if(isset($_SESSION["status"]) && $_SESSION["status"] != "logado"){
        header("Location: ../controller/navegacao.php");
    }
?>