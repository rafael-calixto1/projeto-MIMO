<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../externo/css/atualizar-style.css">
    <title>MIMO</title>
</head>

<body>
    <div class="div-principal">
        <header>
            <img src="../externo/images/logo.png" alt="logoMimo">
            <span>MEU INVENTÁRIO, MEU ORGANIZADOR</span>
        </header>
        <section class="secao-bemvindo">
            <h1>
                SEJA BEM-VINDO!
            </h1>
            <hr>
            <p>
                O sistema MIMO permite REGISTRAR, VISUALIZAR, ATUALIZAR e REMOVER itens.
            </p>
        </section>
        <?php
        require_once '../conexaoBD.php';
        $id = $_POST['btnAtualizar'];
        $sql = "SELECT * FROM produto WHERE id_produto = " . $id . ";";
        $resultado = $conexao->query($sql);
        $array = mysqli_fetch_assoc($resultado);
        $conexao->close();
        ?>
        <section>
            <h2 class="tamanho-medio"><i class="fa fa-pencil" aria-hidden="true"></i> ATUALIZAR</h2>
            <div class="form-container">
                <form method="post" action="atualizarItemBD.php" id="formularioAtualizar">
                    <input id="idProduto" name="idProduto" value="<?php echo $array['id_produto'] ?>" hidden type="number">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome do Produto:</label>
                        <input id="nomeProduto" autocomplete="off" type="text" name="txtNomeItemAdd" class="form-control" id="exampleFormControlInput1" value="<?php echo $array['nome_produto'] ?>" placeholder="EX: Roupa de cachorro" required> 
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Quantidade:</label>
                        <input id="quantidade" autocomplete="off" type="number" name="numQuantidadeAdd" class="form-control" id="exampleFormControlInput1" value="<?php echo $array['quantidade'] ?>" min="1" placeholder="EX: 20 roupas de cachorros" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Valor R$:</label>
                        <input id="valor" autocomplete="off" type="number" name="numValorAdd" class="form-control" id="exampleFormControlInput1" value="<?php echo $array['valor'] ?>" min="0.01" step="0.01" placeholder="Valor">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descriçao:</label>
                        <textarea id="descricao" autocomplete="off" class="form-control" name="txtDescAdd" id="exampleFormControlTextarea1" rows="3"><?php echo $array['descricao'] ?></textarea>
                    </div>
                    <div class="card-imagem">
                        <img src="<?php echo $array['link_img'] ?>" alt="">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link Imagem:</label>
                        <input autocomplete="off" type="text" name="txtLinkImg" class="form-control" id="exampleFormControlInput1" value="<?php echo $array['link_img'] ?>" min="0.01" step="0.01" placeholder="https://link.com">
                    </div>
                    <div class="modal-footer" style="display:flex; justify-content:space-between;">
                        <a href="../index.php">
                            <button class="btn btn-voltar" type="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLTAR</button>
                        </a>
                        <button id="btnEnviar" type="submit" name="btnAddItem" class="btn btn-primary btn-enviar"> SALVAR <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../externo/js/atualizar-js.js"></script>
</body>

</html>