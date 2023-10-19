
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
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

	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				
				<h2>Compra efetuada com sucesso!! Seu número de registro é: <?php echo $ticket; ?></h2>				
							
			</div>
		</div>
	</div>
	
	<?php include 'rodape.html' ?>
	
	
	
	
</body>
</html>