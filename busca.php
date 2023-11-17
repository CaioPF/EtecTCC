
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Protect King</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<?php include 'links.php'; ?>
	
<style>
.navbar{
    margin-bottom: 0;
}
</style>
</head>

<body>	
<?php
include 'conexao.php';	
include 'menu.php';

if(empty($_GET['txtbuscar'])){
    header("location:index.php");
    exit;
}

$pesquisa = $_GET['txtbuscar'];
$consulta = $mysqli->query("SELECT * FROM produto WHERE nome_produto LIKE CONCAT('%','$pesquisa','%')");
// se for adicionado uma tabela para marcas do produto adicione o 
//seguinte código "OR nome_marca_produto LIKE CONCAT('%','$pesquisa','%')" depois do "CONCAT('%','$pesquisa','%')"
// mas tera que fazer um inner join.
if ($consulta->num_rows == 0) {
    header("location:erro_busca.php");
    exit;
}

?>
	
<div class="container-fluid"></br></br></br>
    <?php while ($exibe_busca = $consulta->fetch_assoc()){?>
	<div class="row" style="margin-top: 15px;">
		<div class="col-sm-1 col-sm-offset-1"><img src="foto_produto/<?php echo $exibe_busca['pasta_imagem']; ?>/<?php echo trim($exibe_busca['imagem_produto']); ?>" class="img-responsive imgm"><!--busca a imagem do produto--></div>

		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe_busca['nome_produto'];?></h4></div>
        <!-- busca o nome do produto -->

		<div class="col-sm-2"><h4 style="padding-top:20px">R$ <?php 
                        echo number_format($exibe_busca['preco_produto'], 2, ',','.'); ?></h4></div>

		<div class="col-sm-2 col-xs-offset-right-1" style="padding-top:20px">
            <a href="detalhes.php?id_produto=<?php echo $exibe_busca['id_produto']; ?>">
                <button class="btn btn-lg btn-block btn-default"><span 
                    class="glyphicon glyphicon-info-sign" style="color: cadetblue;"> Detalhes</span></button>
            </a>
		</div> 		
	</div>	
    <?php }?>	
</div>

</br></br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php include 'rodape.html'; ?>
	
</body>
</html>
<?php ob_start(); ?>