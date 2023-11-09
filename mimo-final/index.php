<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="externo/css/index-style.css">
    <title>MIMO</title>
</head>

<body>
    <div class="div-principal">
        <header>
            <img src="externo/images/logo.png" alt="logoMimo">
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
        <section class="secao-opcoes">
            <h2 class="tamanho-medio"><i class="fa fa-th-large" aria-hidden="true"></i> OPÇÕES</h2>
            <div class="botoes-container">
                <button type="button" class="btn btn-novo-item" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus" aria-hidden="true"></i> ADICIONAR</button>
            </div>
        </section>
        <section class="secao-tabela">
            <table class="table">
                <thead style="background-color:paleturquoise;">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col"><i class="fa fa-dropbox" aria-hidden="true"></i> NOME</th>
                        <th scope="col" class="nao-mobile"><i class="fa fa-cubes" aria-hidden="true"></i> QTD.</th>
                        <th scope="col" class="nao-mobile"><i class="fa fa-usd" aria-hidden="true"></i> VALOR</th>
                        <th scope="col" class="nao-mobile"><i class="fa fa-calendar-o" aria-hidden="true"></i> DATA</th>
                        <th scope="col" class="th-icone"></th>
                        <th scope="col" class="th-icone"></th>
                        <th scope="col" class="th-icone"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    setlocale(LC_MONETARY, "pt_BR");

                    require_once "conexaoBD.php";

                    $sql = "SELECT * FROM produto";
                    $linhas = $conexao->query($sql);
                    if ($linhas) {
                        foreach ($linhas as $linha) {
                            echo
                            '
                                    <tr class="linha-hover">
                                        <td>' . $linha['id_produto'] . '</td>
                                        <td>' . $linha['nome_produto'] . '</td>
                                        <td class="nao-mobile">' . $linha['quantidade'] . ' un.</td>
                                        <td class="nao-mobile">R$ ' . number_format($linha['valor'], 2, ",", ".") . '</td>
                                        <td class="nao-mobile">' . date_format(date_create($linha['data_registro']), "d/m/Y") . '</td>
                                        <td class="td-icone"><form method="post" action="action/listarItemAction.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnVisualizar"><i class="fa fa-eye" aria-hidden="true"></i></button></form></td>
                                        <td class="td-icone"><form method="post" action="action/atualizarItemAction.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnAtualizar"><i class="fa fa-refresh" aria-hidden="true"></i></button></form></td>
                                        <td class="td-icone"><form method="post" action="action/deletarItemAction.php"><button value="' . $linha['id_produto'] . '" class="btn" name="btnExcluir" onclick="return confirmarRemocao();"><i class="fa fa-times" aria-hidden="true"></i></button></form></td>
                                    </tr>
                                ';
                        }
                    };
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </section>
        <hr>
        <footer class="footer-estilo">
            <span><i class="fa fa-desktop" aria-hidden="true"></i> DESENVOLVIDO POR: </span>
            <ul class="lista-devs">
                <li>RAFAEL REIS </li>
                <li>NOHAN BRANDON</li>
                <li>DAVI GRILO</li>
                <li>RAFAEL CALIXTO</li>
                <li>MANSANO</li>
                <li>MAYCON ROMERA</li>
                <li>MATEUS</li>
                <li>RENNAN</li>
            </ul>
        </footer>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ADICIONAR ITEM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formularioEnviar" method="post" action="action/inserirItemAction.php">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome do Produto:</label>
                            <input id="nomeProduto" autocomplete="off" type="text" name="txtNomeItemAdd" class="form-control" id="exampleFormControlInput1" placeholder="EX: Roupa de cachorro" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Quantidade:</label>
                            <input id="quantidade" autocomplete="off" type="number" name="numQuantidadeAdd" class="form-control" id="exampleFormControlInput1" min="1" placeholder="EX: 20 roupas de cachorros" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Valor R$:</label>
                            <input autocomplete="off" type="number" name="numValorAdd" class="form-control" id="exampleFormControlInput1" min="0.01" step="0.01" placeholder="Valor">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Descriçao:</label>
                            <textarea autocomplete="off" class="form-control" name="txtDescAdd" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Link Imagem:</label>
                            <input autocomplete="off" type="text" name="txtLinkImg" class="form-control" id="exampleFormControlInput1" min="0.01" step="0.01" maxlength="254" placeholder="https://link.com">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="externo/js/index-js.js"></script>
</body>

</html>