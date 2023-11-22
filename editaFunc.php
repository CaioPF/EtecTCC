<?php 
include 'conexao.php';

$id_func =$_GET['id_func'];

$sqlSelect = "SELECT * FROM  funcionario where id_func = $id_func";

$result = $mysqli->query($sqlSelect);

if($result->num_rows > 0)
{
    while($consulta_usuario = mysqli_fetch_assoc($result))
    {
       
        $nome_func = $consulta_usuario ['nome_func'];
        $sobrenome_func = $consulta_usuario ['sobrenome_func'];
        $nascimento_func = $consulta_usuario ['nascimento_func'];
        $cpf_func = $consulta_usuario ['cpf_func'];
        $cargo_func = $consulta_usuario ['cargo_func'];
       
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
.center-content {
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
				<form  method="POST" action="saveEditPf.php" class="center-content" enctype="multipart/form-data" >

					<div class="mb-3">
                        <label for="nome_pf" class="form-label">Nome</label>
                        <input type="text" name="nome_func" value="<?php echo $nome_func ?>" br>
					</div>
					
					<div class="form-group">
                        <label for="sobrenome_pf">Sobrenome</label>
                        <input type="text" class="form-control" placeholder="Digite o nome"  name="sobrenome_func" value="<?php echo $sobrenome_func ?>" br>
					</div>

                    <div class="form-group">
                        <label for="nascimento_pf">Data de Nascimento</label>
                        <input type="date" name="nascimento_func" value="<?php echo $nascimento_func ?>" ><br>
					</div>

                    <div class="form-group">
                        <label for="cpf_pf">CPF</label>
                        <input type="number" name="cpf_func" maxlength="11" id="mask_cpf" value="<?php echo $cpf_func ?>">
                        <div id="cpf-erro" class="erro" style="display: none;">CPF </div><br>
					</div>
                  

                    <div class="form-group">
                        <label for="sobrenome_pf">Cargo</label>
                        <input type="text" class="form-control" placeholder="Digite o nome"  name="cargo_func" value="<?php echo $cargo_func ?>" br>
					</div>
                    </br>
				   <div  class="button">
                        <input type="hidden" name="id_func" value="<?php echo $id_func ?> ">
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
</body>
</html>