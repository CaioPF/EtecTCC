<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Protect King</title>



  <?php
  include 'conexao.php';
  include 'links.php';
  ?>
  <link href="index.css" rel="stylesheet" type="text/css">
  <script src='carrossel.js'></script>
</head>

<body>
  <?php
  include 'menu.php';
  include 'carrossel.html';

  $consulta = $mysqli->query('select id_produto,imagem_produto, nome_produto, preco_produto, quantidade_produto, 
                            pasta_imagem from produto');
  ?>
  <br><br>
  <div class="content">
    <div class="slides">
      <input class="input" type="radio" name="slide" id="slide1" checked>
      <input class="input" type="radio" name="slide" id="slide2">
      <input class="input" type="radio" name="slide" id="slide3">
      <input class="input" type="radio" name="slide" id="slide4">
      <input class="input" type="radio" name="slide" id="slide5">

      <?php while ($exibe = $consulta->fetch_assoc()) { ?>

        <div class="slide s1 hoverp">
          <a href="contato.php">
            </br>
            <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>"
              class="img-responsive imgm">
            <!--TRIM remove todos os possiveis espaços que podem atrapalhar o código-->

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

      <?php } ?>
    </div>
  </div>
  <div class="navigation">
    <label class="bar" for="slide1"></label>
    <label class="bar" for="slide2"></label>
    <label class="bar" for="slide3"></label>
    <!--<label class="bar" for="slide4"></label>
        <label class="bar" for="slide5"></label>-->

  </div>


  <?php include 'rodaPE.html'; ?>
</body>







<style type="text/css">
  .content {
    height: 30vw;
    width: 100%;
    border-color: black;
    overflow: hidden;
    /*centralizado*/
    border-width: 1.5px;
    border-style: solid;

  }

  .content .slide {
    height: 100%;
    width: 100%;
  }

  img {
    height: 25vw;
    width: 100%;
    max-height:100%;
    /* Evita que a imagem fique maior que 28px de altura */
    max-width: 357.14vw;
    /* Calculado com base na proporção original */
  }

  .navigation {
    margin-left: 46%;
    bottom: 17vw;
    left: 43vw;
    display: flex;
  }

  .bar {
    height: 8px;
    width: 30px;
    border: 2px solid rgb(170, 170, 170);
    background-color: rgb(170, 170, 170);
    margin: 6px;
    border-radius: 15px;
    cursor: pointer;
    transform: .5s ease;
  }

  .bar:hover {
    background-color: #Daa520;
    border: 2px solid #Daa520;
  }

  input {
    display: none;
  }

  .slides {
    display: flex;
    width: 500%;
    height: 100%;
  }

  .slide {
    width: 100%;
    transition: .6s;
  }

  #slide1:checked~.s1 {
    margin-left: 0;
  }

  #slide2:checked~.s1 {
    margin-left: -20%;
  }

  #slide3:checked~.s1 {
    margin-left: -40%;
  }

  #slide4:checked~.s1 {
    margin-left: -60%;
  }

  #slide5:checked~.s1 {
    margin-left: -80%;
  }

  .label {
    display: flex;
    margin-top: 6.1%;
    cursor: pointer;
    background-color: none;
    border-radius: 1vw;
    align-items: center;
    position: relative;
    width: 5vw;
    transform: scale(1.2);
  }
</style>

</html>