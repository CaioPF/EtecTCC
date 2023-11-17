<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<?php  
include 'conexao.php';
include 'links.php';
include 'menu.php';
?>

<style>
.navbar{
    margin-bottom: 0;
}
</style>

</head>

<body>	
	<?php
    //se o usuário tentar acessar um dos arquivos pela URL ou sem estar logado como ADM, ele será redirecionado para a index
    if (empty($_SESSION['Status']) || $_SESSION['Status'] != 'ADM'){
        header('location: index.php');
    } 
	
	$consulta = $mysqli->query("SELECT * from produto");
	?>
	
<div class="container-fluid">

	<?php while ($exibe = $consulta->fetch_assoc()) { 
        ?>

	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']);?>" class="img-responsive imgm"></div>
		<div class="col-sm-5"><h4 style="padding-top:20px"><?php echo $exibe['nome_produto']; ?></h4></div>

		<div class="col-sm-2" style="padding-top:20px">
            <a href="adm_pg_alterar.php?id=<?php echo $exibe['id_produto'];?>&id2=<?php echo $exibe['categoria_produto'];?>">
            <button class="btn btn-lg btn-block btn-default">
            <span class="glyphicon glyphicon-pencil"> Alterar</span>
            </button>
            </a>
		</div>

	</div>		
	<?php } ?>
</div>

<?php include 'rodape.html'; ?>
</body>
</html>