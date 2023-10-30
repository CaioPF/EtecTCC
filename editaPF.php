<?php 
include 'conexao.php';

$id_pf =$_GET['id_pf'];

$sql = "SELECT * FROM  pessoa_fisica where id_pf = $id_pf";

$result = $mysqli->query($sql);

if($result->num_rows > 0)
{
    while($consulta_usuario = mysqli_fetch_assoc($result))
    {
        $nome_pf = $consulta_usuario ['nome_pf'];
        $sobrenome_pf = $consulta_usuario ['sobrenome_pf'];
        $nascimento_pf = $consulta_usuario ['nascimento_pf'];
        $cpf_pf = $consulta_usuario ['cpf_pf'];
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
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset disabled>
                <legend>Editar Cliente PF</legend>
                    <div class="mb-3">
                        <label for="nome_pf">Nome:</label>
                        <input type="text" name="nome_pf" value="<?php echo $nome_pf ?>" br>

                        <label for="sobrenome_pf">Sobrenome:</label>
                        <input type="text" name="sobrenome_pf" value="<?php echo $sobrenome_pf ?>" br>

                        <label for="nascimento_pf">Data de Nascimento:</label>
                        <input type="date" name="nascimento_pf" value="<?php echo $nascimento_pf ?>" ><br>

                        <label for="cpf_pf">CPF:</label>
                        <input type="number" name="cpf_pf" maxlength="11" id="mask_cpf" value="<?php echo $cpf_pf ?>">
                        <div id="cpf-erro" class="erro" style="display: none;">CPF </div><br>
                    </div>
                <button type="submit" name="update" id="update" class="btn btn-warning">Enviar</button>
            </fieldset>
        </form>
    </div>

      
    <?php include 'rodape.html' ?>
</body>
</html>