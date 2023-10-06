<!--Esse arquivo redireciona o usuario para uma mensagem de erro ao tentar fazer o login e dar errado-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>

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
			<h2>Nenhum produto foi encontrado!</h2>
		</div>
	</div>
</div>

<?php include 'rodape.html' ?>
</body>
</html>