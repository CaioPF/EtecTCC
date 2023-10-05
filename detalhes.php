<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Protector Kings</title>
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

// o metedo $_GET é para puxar as informações da URL, o "id_produto" está vindo da URL
$id_produto = $_GET['id_produto'];

$consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto = '$id_produto'");
$exibe = $consulta->fetch_assoc();

?>
	
<div class="container-fluid">
    <div class="row">
		<div class="col-sm-4 col-sm-offset-1">
			 <h1>Detalhes do Produto</h1>
			 <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>.jpg" class="img-responsive imgm" >
				<div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
				<div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
		</div>

 		<div class="col-sm-7"><h1><?php echo $exibe['nome_produto']; ?></h1>
            <p><?php echo $exibe['descricao_produto']; ?></p>
            <p>R$ <?php echo number_format($exibe['preco_produto'], 2, ',','.'); ?></p>
            
            <button class="btn btn-lg btn-success">Comprar</button>	
        </div>
	</div>		
</div>
	
<?php include 'rodape.html'; ?>
</body>
</html>