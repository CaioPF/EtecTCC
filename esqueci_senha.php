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
	</style>
</head>

<body>
<?php
include 'conexao.php';	
include 'menu.php'; 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            </br></br></br></br></br></br></br>
            <h2>Digite o email cadastrado na loja</h2>

            <form method="post" action="enviar_email.php" name="login">
                <div class="form-group">
                    <input name="txtemail" type="email" class="form-control" required id="email">
                </div>

                <button type="submit" class="btn btn-lg btn-default">
                    <span class="glyphicon glyphicon-envelope"> Enviar</span>
                </button>

            </form>

            <a href="cadastro.php">
                <button type="submit" class="btn btn-lg btn-link">Ainda não sou cadastrado

                </button>
            </a>

        </div>
    </div>
</div>

</br></br></br></br></br></br></br></br>
<?php include 'rodape.html';?>

</body>
</html>