<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Usuário</title>
    <link rel="stylesheet" href="login.css">
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.main.js"></script>


</head>

<body class="body">
<?php  
include 'conexao.php';
?>

	<div class="nav">
		<nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
		<div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
			
			<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Protector Kings</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="contato.php">Contato</a></li>
				<li><a href="cadastro.php"><span> Cadastro</a></li>
			</ul>
			</div>
		</div>
		</nav>
	</div>

	<div class="Conteiner">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<h2 class="LU">Login de Usuário</h2>
						<div class="form-group">
							<label for="email">Email</label>
							 <input name="email" type="email" class="form-control" required id="email">
						</div>
						<div class="form-group">
							<label for="senha">Senha</label>
							<input name="senha" type="password" class="form-control" required id="senha">
						</div>
							
						<button type="submit" class="btn btn-lg btn-default">
							<span class="glyphicon glyphicon-ok"> Entrar</span>
						</button>
					
						<button type="submit" class="btn btn-lg btn-link">
							Ainda não sou cadastrado
						</button>	
				</div>
			</div>
		</div>
	</div>

<?php include 'rodape.html' ?>
</body>
</html>