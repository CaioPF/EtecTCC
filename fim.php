<!DOCTYPE html>
<html>
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
<?php include 'conexao.php'; ?><br><br>

<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-0 text-center">
				<a href="perfil_usuario.php"><h2>Historico de compra </h2></a>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h1>Compra efetuada com sucesso!!</h1><br>
				<h2>Seu número de registro é: <?php echo $ticket; ?></h2>						
			</div>
		</div>
	</div>

	</br></br></br></br></br></br></br>v
<?php include 'rodape.html' ?>
</body>
</html>