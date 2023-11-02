<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Protect King</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
include 'conexao.php';
include 'menu.php';

if (isset($_GET['cat'])) {
    // A variável 'cat' está definida na URL (categoria.php)
    $cat = $_GET['cat'];
    // Execute o código relacionado à categoria aqui
} 
else {
    header("Location: index.php"); // Redireciona para a página inicial
    exit;
}
?>
<!-- <title>?php echo $cat ?></title> -->

<link rel="stylesheet" href="index.css">

<?php include 'links.php'; ?>
</head>

<body>
<?php
//variavel consulta  vai receber  variavel $mysql que é a variavel da conexão com o banco de dados na pg conexão.php
$consulta = $mysqli->query("select id_produto, imagem_produto, nome_produto, preco_produto, quantidade_produto, pasta_imagem from produto where categoria_produto = '$cat'");
?>




  
<div class="nomecat">
    <h1> <?php echo $cat ?> </h1> <!--esta puxando o nome da categoria -->
  </div>
  <div class = "container-fluid " style="margin-left: 4.5%;"> 
  <div class = "row">
  <?php   while($exibe = $consulta->fetch_assoc()){  ?>
    <div class = "col-sm-3">
    <div class = "hoverp " >
      
      <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']);?>" class="img-responsive imgm" > <!--TRIM remove todos os possiveis espaços que podem atrapalhar o código-->

       <div><h4 style="text-align: center;"><b><?php echo mb_strimwidth($exibe['nome_produto'], 0, 15, '...'); ?></b></h4></div> <!--mb_strimwidth limita o tanto de caracteres que é visivel-->

      <div><h5 style="text-align: center;">R$ <?php echo number_format($exibe['preco_produto'], 2, ',','.'); ?></h5></div> <!--number_format faz com que o preço fique no formato padrão BR-->
      
      <div class="text-center">
        <!--Essa linha permite que o botão delahes seja redirecionado para o arquivo detalhes.php-->
        <a href="detalhes.php?id_produto=<?php echo $exibe['id_produto']; ?>"> <!--"detalhes.php?id_produto" o id_produto-->
        <button class="btn btn-three">                                                                <!---é uma variavel-->
          <span class="glyphicon glyphicon-info-sign" style="Color: cadetblue"> Detalhes</span>
        </button>
        </a>
      </div>
      <?php include 'botao_esgotado.php'; ?></br>
      </div>
    </div>
    <?php } ?>
</div>
</div>
</body>
</html>