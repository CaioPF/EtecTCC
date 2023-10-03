<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Usuário</title>
	
    <link rel="stylesheet" href="login.css">
	
	<?php include 'links.php'; ?>
	
</head>

<body class="body">

<?php  include 'conexao.php'; ?>

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
		<a class="navbar-brand" href="index.php">Protector Kings</a>
		</div>
		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="cadastro.php"><span> Cadastro</a></li>
			<li><a href="contato.php">Contato</a></li>
		</ul> 
		</div>
	</div>
	</nav>
</div>
<!------------------------------------------------------------------------------------------------->

<div class="Conteiner" >
	<div class="container-fluid">
		<div class="bvvvxW">
			<img src="foto_produto/logo/logo-coroa.svg" class="logo">
			</br></br><h2 class="LU">Login de Usuário</h2></br></br>
				<form name="frmusuario" method="post" action="validacao_usuario.php" class="">
					<div class="form-group">
						<label for="email">Email</label>
							<input name="txtemail" type="email" class="form-control" required id="email">
					</div>
					
					<div class="form-group">
						<label for="senha">Senha</label>
						<input name="txtsenha" type="password" class="form-control" required id="senha">
					</div>
						
					<button type="submit" class="btn btn-lg btn-warning">
						<span> Entrar</span>
					</button>
				
					<button type="submit" class="btn btn-secondary btn-lg disabled" role="button" aria-disabled="true" >
						<a href="cadastro.php" >Cadastre-se</a>
					</button></br></br></br></br></br></br></br></br>
				</form>	
			</div>
		</div>
	</div>
</div>

<?php include 'rodape.html' ?>
</body>
</html>