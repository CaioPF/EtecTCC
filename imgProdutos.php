<?php
//variavel consulta  vai receber  variavel $mysql que é a variavel da conexão com o banco de dados na pg conexão.php
$consulta = $mysqli->query('select imagem_produto, nome_produto, preco_produto, quantidade_produto, pasta_imagem from produto');
?>

<div class = "container-fluid">
  <div class = "row">
  <?php   while($exibe = $consulta->fetch_assoc()){  ?>
    <div class = "col-sm-3">
      
      <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>.jpg" class="img-responsive" style="width: 100%"> <!--TRIM remove todos os possiveis espaços que podem atrapalhar o código-->

       <div><h4 style="text-align: center;"><b><?php echo mb_strimwidth($exibe['nome_produto'], 0, 30, '...'); ?></b></h4></div> <!--mb_strimwidth limita o tanto de caracteres que é visivel-->

      <div><h5 style="text-align: center;">R$ <?php echo number_format($exibe['preco_produto'], 2, ',','.'); ?></h5></div> <!--number_format faz com que o preço fique no formato padrão BR-->
      
      <div class="text-center">
        <button class="btn btn-three">
          <span class="glyphicon glyphicon-info-sign" style="Color: cadetblue"> Detalhes</span>
        </button>
      </div>

      <div class="text-center" style="margin-top: 1.5%"; margin-bottom: 1%>
        <?php if ($exibe['preco_produto'] > 0) { ?>

        <button class="btn btn-three">
          <span class="glyphicon glyphicon-shopping-cart"> Comprar</span>
        </button>

        <?php } else { ?> 

        <button class="btn btn-lg btn-block btn-danger" disabled>
          <span class="glyphicon glyphicon-remove-circle"> Todos vendidos</span>
        </button>

        <?php } ?>
      </div>


    </div>
    <?php } ?>
  </div>
</div>







