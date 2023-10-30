<?php 
include 'conexao.php';

$id_pj =$_GET['id_pj'];

$sql = "SELECT * FROM  pessoa_juridica where id_pj = $id_pj";

$result = $mysqli->query($sql);

if($result->num_rows > 0)
{
    while($consulta_usuario = mysqli_fetch_assoc($result))
    {
        $nome_fantasia_pj = $consulta_usuario ['nome_fantasia_pj'];
        $razao_social_pj = $consulta_usuario ['razao_social_pj'];
        $cnpj_pj = $consulta_usuario ['cnpj_pj'];
        $data_abertura_pj = $consulta_usuario ['abertura_pj'];
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
    
       
    <form>
    <fieldset disabled>
        <legend>Editar Cliente PJ</legend>
        <div class="mb-3">
            <label for="nome_fantasia_pj">Nome Fantasia:</label>
            <input type="text" name="nome_fantasia_pj" value="<?php echo $nome_fantasia_pj ?>" ><br>

            <label for="razao_social_pj">Razão Social:</label>
            <input type="text" name="razao_social_pj" value="<?php echo $razao_social_pj ?>" ><br>

            <label for="cnpj_pj">CNPJ:</label>
            <input type="number" name="cnpj_pj" maxlength="14" id="mask_cnpj_pj" value="<?php echo $cnpj_pj ?>"><br>

            <label for="abertura_pj">Data de Abertura:</label>
            <input type="date" name="abertura_pj" id="mask_abertura_pj" value="<?php echo $abertura_pj ?>"><br>

        </div>
        <button type="submit" class="btn btn-warning">Enviar</button>
    </fieldset>
    </form>


  

      
    <?php include 'rodape.html' ?>
</body>
</html>