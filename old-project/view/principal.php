<?php
require_once "../controller/verificarStatus.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/principal-style.css">
    <title>MIMO - Principal</title>
</head>

<body>
    <div class="main-section" style="background-color: pink;">
        <div class="logo-container">
            <img src="../view/images/logo.png">
        </div>
        <div class="corpo-section">
            <div class="espaco">
                <div class="opcoes">
                    <h1>OPÇÕES</h1>
                    <div class="opcoes_buttton-container">
                        <button type="button" class="btn adicionar-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus" aria-hidden="true"></i> ADICIONAR</button>
                        <button class="categoria-btn btn" data-toggle="modal" data-target="#exampleModalCategoria"><i class="fa fa-tag" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="tabela">
                    <table class="table tabela-hover">
                        <thead>
                            <tr>
                                <th scope="col"><i class="fa fa-dropbox" aria-hidden="true"></i> NOME</th>
                                <th scope="col"><i class="fa fa-cubes" aria-hidden="true"></i> QTD.</th>
                                <th scope="col"><i class="fa fa-usd" aria-hidden="true"></i> VALOR</th>
                                <th scope="col"><i class="fa fa-calendar-o" aria-hidden="true"></i> DATA</th>
                                <th scope="col" class="th-icone"></th>
                                <th scope="col" class="th-icone"></th>
                                <th scope="col" class="th-icone"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            require_once "../controller/itemController.php";
                            $iCon = new ItemController();
                            $iLinhas = $iCon->listarItens($_SESSION['usuario']['id_usuario']);
                            foreach ($iLinhas as $linha) {
                                echo
                                '
                                <tr>
                                <td>' . $linha['nome_produto'] . '</td>
                                <td>' . $linha['quantidade'] . ' un.</td>
                                <td>R$ ' . str_replace(".", ",", $linha['valor']) . '</td>
                                <td>' . str_replace("-", "/", date('d-m-Y', strtotime($linha['data_registro']))) . '</td>
                                <td class="td-icone"><form method="post" action="../controller/navegacao.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnVisualizar"><i class="fa fa-eye" aria-hidden="true"></i></button></form></td>
                                <td class="td-icone"><form method="post" action="../controller/navegacao.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnAtualizar"><i class="fa fa-refresh" aria-hidden="true"></i></button></form></td>
                                <td class="td-icone"><form method="post" action="../controller/navegacao.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnExcluir" onclick="return confirmRemocao();"><i class="fa fa-times" aria-hidden="true"></i></button></form></td>
                                </tr>
                                ';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ADICIONAR ESTOQUE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../controller/navegacao.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome do Produto:</label>
                            <input autocomplete="off" type="text" name="txtNomeItemAdd" class="form-control" id="exampleFormControlInput1" placeholder="EX: Roupa de cachorro">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Categoria:</label>
                            <select name="optionCategoriaAdd" class="form-control" id="exampleFormControlSelect1">
                                <option value="">SEM CATEGORIA</option>
                                <?php
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
                            <input autocomplete="off" type="number" name="numQuantidadeAdd" class="form-control" id="exampleFormControlInput1" min="1" placeholder="EX: 20 roupas de cachorros">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Valor R$:</label>
                            <input autocomplete="off" type="number" name="numValorAdd" class="form-control" id="exampleFormControlInput1" min="0.01" step="0.01" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descriçao:</label>
                            <textarea autocomplete="off" class="form-control" name="txtDescAdd" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="foto-style" style="display:flex; flex-direction:column;">
                            <label for="foto">Foto do produto:</label>
                            <input autocomplete="off" type="file" id="foto" name="blobImgAdd" accept="image/*" required><br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="btnAddItem" class="btn btn-primary">Salvar Alteraçoes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ADICIONAR CATEGORIA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../controller/navegacao.php">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">NOME CATEGORIA:</label>
                            <input autocomplete="off" type="text" class="form-control" name="txtCategoria" id="exampleFormControlInput1" placeholder="EX: Roupas" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="btnAdicionarCategoria" class="btn btn-primary">Salvar Alteraçoes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>