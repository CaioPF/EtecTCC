<link rel="stylesheet" href="botao_comprar.css">

<div class="text-center" style="margin-top: 1.5%"; margin-bottom: 1%>
  <?php if ($exibe['quantidade_produto'] > 0) { ?>

  <a href="carrinho.php?id_produto=<?php echo $exibe['id_produto']; ?>">
  <button class="btn btn-three">
    <span class="glyphicon glyphicon-shopping-cart"> Carrinho</span>
  </button>
  </a>

  <?php  }
         else { ?> 

  <button class="btn btn-block btn-danger" disabled>
    <span class="glyphicon glyphicon-remove-circle"> Esgotado</span>
  </button>

  <?php  } ?>
</div>