<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Cadastro de Produto</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Cadastro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listarProdut.php">Produto</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                  include("conectarDB.php");
                  $sql = "SELECT * FROM produto WHERE idProduto=".$_REQUEST["idProduto"];
                  $resultado = $conexao->query($sql) or die($conexao->error);
                  $linhas = $resultado->fetch_object();
                ?>
                <form action="salvarProdut.php" method="POST">
                    <input type="hidden" name="acao" value="editar">
                    <input type="hidden" name="idProduto" value="<?php print $linhas->idProduto; ?>">
                    <div class="form-group">
                        <label>Nome Produto</label>
                        <input type="text" name="nomeProdut" class="form-control" value="<?php print $linhas->nomeProdut; ?>">
                    </div>
                    <div class="form-group">
                        <label>Quantidade do produto</label>
                        <input type="value" name="qtdProdut" class="form-control" value="<?php print $linhas->qtdProdut; ?>">
                    </div>
                    <div class="form-group">
                        <label>Valor do produto</label>
                        <input type="value" name="vlrProdut" class="form-control" value="<?php print $linhas->vlrProdut; ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
