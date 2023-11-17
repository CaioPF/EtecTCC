<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Protect King</title>

  <link rel="stylesheet" href="index.css">

  <?php
  include 'conexao.php';
  include 'links.php';
  ?>
</head>

<body style="background-color: #f4f4f4 !important;">
  <?php
  include 'menu.php';
  ?>
  
  <?php
  include 'carrossel.html';

  $consulta = $mysqli->query('select id_produto,imagem_produto, nome_produto, preco_produto, quantidade_produto, 
                            pasta_imagem from produto');
  ?>
  <br><br>
  <div class="container-fluid" style="margin-left: 2.5%; background-color: #f4f4f4;">
    <div class="row">
      <div class="container">
        <?php while ($exibe = $consulta->fetch_assoc()) { ?>
          <div class="col-sm-3">
            <div class="hoverp">
              <a href="detalhes.php?id_produto=<?php echo $exibe['id_produto']; ?>">
                </br>
                <img
                  src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>"
                  class="img-responsive imgm"> <!--TRIM remove todos os possiveis espaços que podem atrapalhar o código-->

                <div>
                  <h4 style="  text-decoration: none;
                         color: black;
                         text-align: center;">
                    <b>
                      <?php echo mb_strimwidth($exibe['nome_produto'], 0, 15, '...'); ?>
                    </b>
                  </h4>
                </div> <!--mb_strimwidth limita o tanto de caracteres que é visivel-->

                <div>
                  <h5 style="  text-decoration: none;
                        color: black;
                        text-align: center;">
                    R$
                    <?php echo number_format($exibe['preco_produto'], 2, ',', '.'); ?>
                  </h5>
                </div> <!--number_format faz com que o preço fique no formato padrão BR-->
              </a>
            </div>
          </div>

        <?php } ?>
        </div>
      </div>
    </div>
  </div><br><br><br><br>
  
  <?php include 'rodaPE.html'; ?>

</body>
</html>