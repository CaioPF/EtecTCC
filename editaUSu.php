<?php 
include 'conexao.php';

$id_login =$_GET['id_login'];

$sqlSelect = "SELECT * FROM  loginn where id_login = $id_login";

$result = $mysqli->query($sqlSelect);

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
        <style>
           .custom-btn
        {
            background-color: #daa520;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        
        }
.center-conten
{
    
    margin: 0 auto;
    max-width: 50%; /* Define a largura máxima para evitar que o formulário fique muito largo */
}

.bvvvxW {/*imagens index*/
    position: relative ;
    display: flex;
    flex-direction: column;
    width:30%; 
    height: 10;
    -webkit-box-align: center;
    align-items: center;
    background-color: rgb(255, 255, 255) ;
    color: rgb(0, 0, 0); /*troca a cor da letra */
    border-radius: 2%;
    border-style: ridge;
    margin-top:3% ;
    margin-bottom: 10%;
    margin-left: 34%;

    
    
}

.logo{
    margin-top: 10%;
    height: 25%;
    width: 25%;
}


.btn-edit
 {
     background-color: #daa520;  
 }
 
.btn-editB
 {
     background-color: #000000; 
     color: #FFFFFF;
    

 }
 .button
 {
    display: block;
    margin: 0 auto; 
    margin-right: 10px;
}
 .center-content
 {
     text-align: center;
     margin: 0 auto;
     max-width: 50%; /* Define a largura máxima para evitar que o formulário fique muito largo */
}

        </style>
    

</head>

<body>
    <div class="Conteiner" >
	<div class="container-fluid">
		<div class="bvvvxW">
        <img src="foto_produto/logo/logo-coroa.svg" class="logo">
			</br><h2 class="LU">Editar Usuário</h2></br>
				<form  method="POST" action="saveEdit.php" class="center-content" enctype="multipart/form-data" >

                    <div class="form-group">
                         <label for="Id_login">ID:</label>
                         <input type="text" name="Id_login" value="<?php echo $id_login ?>" br>
					</div>

					<div class="mb-3">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?php echo $email ?>" br>
					</div>
					
					<div class="form-group">
                         <label for="senha">Senha:</label>
                         <input type="text" name="senha" value="<?php echo $senha ?>" br>
					</div>
                    </br></br>
				   <div  class="button">
                        <input type="hidden" name="id_login" value="<?php echo $id_login ?> ">
                        <button type="submit" name="update" id="update" class="btn-edit btn btn-lg btn-warning">
                            <span> Enviar</span>
                        </button>
                        <button type="submit" class="btn-editB btn btn-lg btn-white">
                            <span> Voltar</span>
                        </button>
						    
                    </div>
					</button></br>

				</form>	

				
			</div>
		</div>
	</div>
</div>


  

      
    <?php include 'rodape.html' ?>
</body>
</html>