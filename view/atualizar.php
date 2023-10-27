<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/atualizar-style.css">
    <title>MIMO - Atualizar</title>
</head>

<body>
    <div class="modal fade show" id="exampleModalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ATUALIZAR ESTOQUE</h5>
                </div>
                <div class="modal-body">
                    <form method="post" action="../controller/navegacao.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <input hidden type="number" name="numIdAtu" value="<?php echo $iRes['id_produto']?>">
                            <label for="exampleFormControlInput1">Nome do Produto:</label>
                            <input autocomplete="off" value="<?php echo $iRes['nome_produto'] ?>" type="text" name="txtNomeProdutoAtu" class="form-control" id="exampleFormControlInput1" placeholder="EX: Roupa de cachorro">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Categoria:</label>
                            <select class="form-control" name="numIdCategoria" id="exampleFormControlSelect1">
                                <?php
                                if ($iRes['id_categoria'] == "") {
                                    echo "<option value=''>SEM CATEGORIA</option>";
                                } else {
                                    echo "<option default value='" . $iRes['id_categoria'] . "'>" . $iRes['categoria_desc'] . "</option>";
                                }

                                require_once "../controller/categoriaController.php";
                                $cCon = new CategoriaController();
                                $linhas = $cCon->listarCategoria($_SESSION["usuario"]["id_usuario"]);
                                foreach ($linhas as $linha) {
                                    echo "<option value=" . $linha['id_categoria'] . ">" . $linha['descricao'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Quantidade:</label>
                            <input autocomplete="off" type="text" name="numQuantidadeAtu" value="<?php echo $iRes['quantidade'] ?>" class="form-control" id="exampleFormControlInput1" min="1" placeholder="EX: 20 roupas de cachorros">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Valor R$:</label>
                            <input autocomplete="off" type="number" name="numValorAtu" value="<?php echo $iRes['valor'] ?>" class="form-control" id="exampleFormControlInput1" min="0.01" step="0.01" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descriçao:</label>
                            <textarea autocomplete="off" class="form-control" name="txtDescAtu" id="exampleFormControlTextarea1" rows="3"><?php echo $iRes['descricao'] ?></textarea>
                        </div>
                        <div class="foto-style" style="display:flex; flex-direction:column;">
                            <label for="foto">Foto do produto:</label>
                            <?php
                            $base64Data = $iRes['foto'];
                            $dataUri = 'data:image/jpeg;base64,' . $base64Data;
                            echo '<img src="' . $dataUri . '" alt="Your Image">';
                            ?>
                            <input autocomplete="off" type="file" value="<?php echo $dataUri;?>" id="foto" name="blobImgAtu" accept="image/*"><br>
                        </div>
                        <a href="../controller/navegacao.php?atualizarVoltar"><button type="button" class="btn btn-secondary">Voltar</button></a>
                        <button type="submit" name="btnItemAtu" class="btn btn-primary">Salvar Alteraçoes</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../view/js/modal-start.js"></script>
</body>

</html>