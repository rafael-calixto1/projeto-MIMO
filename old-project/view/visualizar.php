<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../view/css/visualizar-style.css">
    <title>MIMO - Visualizar</title>
</head>

<body>
    <div class="modal fade show custom-modal-content" id="exampleModalAtualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">ESTOQUE</h4>
                </div>
                <div class="modal-body">
                    <div class="item-formulario-foto">
                        <?php
                        $base64Data = $iRes['foto'];
                        $dataUri = 'data:image/jpeg;base64,' . $base64Data;
                        echo '<img src="' . $dataUri . '" alt="Your Image">';
                        ?>
                    </div>
                    <div class="item-formulario">
                        <h5>
                            Nome:
                        </h5>
                        <p class="item-conteudo"> <?php echo $iRes['nome_produto']; ?></p>
                    </div>
                    <div class="item-formulario">
                        <h5>
                            Descrição:
                        </h5>
                        <p class="item-conteudo"> <?php echo $iRes['descricao']; ?></p>
                    </div>
                    <div class="coluna-2">
                        <div class="item-formulario">
                            <h5>
                                Categoria:
                            </h5>
                            <p class="item-conteudo"> <?php echo $iRes['categoria_desc']; ?></p>
                        </div>
                        <div class="item-formulario">
                            <h5>
                                Quantidade
                            </h5>
                            <p class="item-conteudo"> <?php echo $iRes['quantidade']; ?> un.</p>
                        </div>

                        <div class="item-formulario">
                            <h5>
                                Valor
                            </h5>
                            <p class="item-conteudo"> R$ <?php echo str_replace(".", ",", $iRes['valor']); ?></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="../controller/navegacao.php?atualizarVoltar"><button type="button" class="btn btn-secondary">Voltar</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../view/js/modal-start.js"></script>
</body>

</html>