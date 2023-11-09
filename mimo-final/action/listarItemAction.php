<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../externo/css/listar-style.css">
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
        $id = $_POST['btnVisualizar'];
        $sql = "SELECT * FROM produto WHERE id_produto = " . $id . ";";
        $resultado = $conexao->query($sql);
        $array = mysqli_fetch_assoc($resultado);
        $conexao->close();
        ?>
        <section class="secao-visualizar">
            <h2 class="tamanho-medio"><i class="fa fa-eye" aria-hidden="true"></i> VISUALIZAR</h2>
            <section class="cards">
                <div class="card-imagem">
                    <img src="<?php echo $array['link_img']; ?>" alt="semImagem">
                </div>
                <div class="card-campos">
                    <div class="campo_desc">
                        <span class="titulo-desc">Dados</span>
                    </div>
                    <div class="campo">
                        <span class="span-titulo">Nome</span>
                        <span class="span-texto"><?php echo $array['nome_produto'];  ?></span>
                    </div>
                    <div class="campo">
                        <span class="span-titulo">Quantidade</span>
                        <span class="span-texto"><?php echo $array['quantidade'];  ?></span>
                    </div>
                    <div class="campo">
                        <span class="span-titulo">Registro</span>
                        <span class="span-texto"><?php echo date_format(date_create($array['data_registro']), "d/m/Y");  ?></span>
                    </div>
                    <div class="campo">
                        <span class="span-titulo">Valor</span>
                        <span class="span-texto">R$ <?php echo number_format($array['valor'], 2, ",", ".");  ?></span>
                    </div>
                    <hr>
                    <div class="campo_desc">
                        <span class="titulo-desc">Descrição</span>
                        <span class="texto-desc"><?php echo $array['descricao']; ?></span>
                    </div>
                </div>
            </section>
            <div class="botoes-container">
                <a href="../index.php">
                    <button class="btn-voltar"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> VOLTAR</button>
                </a>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>