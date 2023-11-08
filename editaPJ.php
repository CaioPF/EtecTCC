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
			</br><h2 class="LU">Editar Cliente</h2></br>
				<form  method="POST" action="saveEditPj.php" class="center-content" enctype="multipart/form-data" >

					<div class="mb-3">
                         <label for="nome_fantasia_pj">Nome Fantasia:</label>
                         <input type="text" name="nome_fantasia_pj" value="<?php echo $nome_fantasia_pj ?>" ><br>
					</div>
					
					<div class="form-group">
                         <label for="razao_social_pj">Razão Social:</label>
                         <input type="text" name="razao_social_pj" value="<?php echo $razao_social_pj ?>" ><br>

					</div>

                    <div class="form-group">
                         <label for="cnpj_pj">CNPJ:</label>
                        <input type="number" name="cnpj_pj" maxlength="14" id="mask_cnpj_pj" value="<?php echo $cnpj_pj ?>"><br>
                    </div>

                    <div class="form-group">
                         <label for="abertura_pj">Data de Abertura:</label>
                         <input type="date" name="abertura_pj" id="mask_abertura_pj" value="<?php echo $abertura_pj ?>"><br>
					</div>
                    </br></br>
				   <div  class="button">
                        <input type="hidden" name="id_pj" value="<?php echo $id_pj ?>">
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