<?php
    require_once '../conexaoBD.php';

    $idProduto = $_POST['btnExcluir'];
    
    if(isset($idProduto) && is_numeric($idProduto)){
        $sql = "DELETE FROM produto WHERE id_produto = ".$idProduto.";";
        if($conexao->query($sql)){
            header('Location: ../index.php');
        } else {
            echo 'erro!';
        }
    } else {
        echo 'erro inesperado! volte.';
    }
?>