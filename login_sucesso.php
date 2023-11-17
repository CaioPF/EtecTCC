<!--Esse arquivo redireciona o usuario para uma mensagem onde o login ddeu certo-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect King</title>

    <?php include 'links.php'; ?>

	<style>
	.navbar{
		margin-bottom: 0;
	}
	.ir-para-login{
    background-color: #daa520;
    color: white;
		}
		.fundo
		{
			width:100% ;
			height: 30.6vw;
		}
	</style>
</head>

<body>
<?php
	include 'conexao.php';
?>

<!------------------------------------------------------------------------------------------------->
<!--Menu-->
<div class="nav">
	<nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
		<div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>              <!--Esse é o botão hamburguer que aparece quando o site-->
					<span class="icon-bar"></span>                              <!-- nao está em tela cheia-->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Protect King</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="cadastro.php"><span> Cadastro</a></li>
					<li><a href="login.php"><span> Login</a></li>
					<li><a href="contato.php">Contato</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<!------------------------------------------------------------------------------------------------->

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 text-center">

			</br></br></br>
			<h2>Usuário cadastrado com sucesso!</h2>

			</br></br>
			<a href="login.php" class="btn btn-block ir-para-login" role="button">Ir para login</a>
			<!--<a href="esquecisenha.php" class="btn btn-block btn-primary" role="button">Esqueci a senha</a>-->
		</div>
	</div>
</div>
</br></br></br></br></br></br></br></br></br></br></br></br></br>
<?php include 'rodape.html' ?>
</body>
</html>