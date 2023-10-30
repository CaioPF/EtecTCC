<?php 
include 'conexao.php';

$id_login =$_GET['id_login'];

$sql = "SELECT * FROM  loginn where id_login = $id_login";

$result = $mysqli->query($sql);

if($result->num_rows > 0)
{
    while($consulta_usuario = mysqli_fetch_assoc($result))
    {
    
        $email = $consulta_usuario ['email'];
        $senha = $consulta_usuario ['senha'];
       
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Protect King</title>

    <?php include 'links.php'; ?>
        
    

</head>

<body>
    
        <!------------------------------------------------------------------------------------------------->
        <!--Menu-->
        <div class="nav">
        <!-- <nav class="navbar navbar-inverse"> Apague o inverse para estar alterando a cor do menu de navegação-->
        <div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
            
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>              <!--Esse é o botão hamburguer que aparece quando o site-->
           
            </button>
            <a class="navbar-brand">Protector Kings</a>
            </div>
            
            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php  include 'session_start.php';?>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="content">
    
       
    <form action="listaUsuarios.php" method="POST">
    <fieldset disabled>
        <legend>Editar Usuários</legend>
        <div class="mb-3">
            <label for="Id_login">ID:</label>
            <input type="text" name="Id_login" value="<?php echo $id_login ?>" br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="<?php echo $email ?>" br>

            <label for="senha">Senha:</label>
            <input type="text" name="senha" value="<?php echo $senha ?>" br>

            <input type="hidden" name="Id_login" value="<?php echo $id_login ?>" >
           
        </div>
        <button type="submit" class="btn btn-warning">Enviar</button>
    </fieldset>
    </form>


  

      
    <?php include 'rodape.html' ?>
</body>
</html>