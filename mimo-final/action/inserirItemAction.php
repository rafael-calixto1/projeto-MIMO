<?php
    require_once '../conexaoBD.php';

    $nomeItem = $_POST['txtNomeItemAdd'];
    $quantidade = $_POST['numQuantidadeAdd'];
    $valor = !empty($_POST['numValorAdd']) ? $_POST['numValorAdd'] : 'NULL';
    $descricao = $_POST['txtDescAdd'];
    $dataRegistro = date("Y-m-d");
    $linkImagem = !empty($_POST['txtLinkImg']) ? $_POST['txtLinkImg'] : 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';
    
    if(!empty($nomeItem) && !empty($quantidade)){
        if(is_string($nomeItem) && is_numeric($quantidade) && (is_numeric($valor) || $valor == 'NULL') 
            && (is_string($descricao) || $descricao == "")){
            $sql = "INSERT INTO produto (nome_produto, descricao, quantidade, data_registro, valor, link_img)
                    VALUES ('".$nomeItem."', '".$descricao."', '".$quantidade."', 
                            '".$dataRegistro."', ".$valor.", '".$linkImagem."');";

            $conexao->query($sql);
        }
    } 
    $conexao->close();
    header("Location: ../index.php");
?>