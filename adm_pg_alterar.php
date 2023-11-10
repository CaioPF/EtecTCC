<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Protect King</title>

<?php  
include 'conexao.php';
include 'links.php';
include 'menu.php';
?>

    <script src="jquery.mask.js"></script>

    <script>
        /* mscara para o preço */	
        $(document).ready(function(){
        $('#altera_preco').mask('0.000.000.000.000.000,00', {reverse: true});	
        });
    </script>
        
    <style>
        .navbar{
            margin-bottom: 0;
        }
    </style>       
</head>

<body>
<?php

//se o usuário tentar acessar um dos arquivos pela URL ou sem estar logado como ADM, ele será redirecionado para a index
if (empty($_SESSION['Status']) || $_SESSION['Status'] != 'ADM'){
    header('location: index.php');
} 
	// recuperando os id que foram enviados pelo arquivo "adm_alterar_produto.php"
	$cd = $_GET['id'];
	$cd2 = $_GET['id2'];
    
	$consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto='$cd'");	
	$exibe = $consulta->fetch_assoc();
	
	$consultaCat = $mysqli->query("SELECT categoria_produto, descricao_produto FROM produto where id_produto='$cd2' union select categoria_produto, descricao_produto FROM produto where id_produto !='$cd2'");
	?>
	
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração do produto</h2>
                
				<form method="post" action="adm_pgif_alterar.php?id_altera=<?php echo $cd; ?>" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="txtisbn">ID do produto</label>
                        <p><?php echo $exibe['id_produto']; ?></p>
					</div>

                    <div class="form-group">
						<label for="txtlivro">Nome do produto</label>
						<input type="text" name="altera_nome_produto" value="<?php echo $exibe['nome_produto']; ?>"  class="form-control" required id="altera_nome_produto">
					</div>
				
					<div class="form-group">
                        <label for="sltcat">Categoria</label>
                        <select class="form-control" name="altera_categotia" id="altera_categotia">
                            <option value="<?php echo $exibe['categoria_produto']; ?>" selected><?php echo $exibe['categoria_produto']; ?></option>
                            <?php  include 'adm_categoria.php'; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="txtresumo">Descrição</label>
                        <textarea rows="5" class="form-control" name="altera_descricao" id="altera_descricao"><?php echo $exibe['descricao_produto']; ?></textarea>
					</div>

                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="text" class="form-control" required name="altera_preco" value="<?php echo $exibe['preco_produto']; ?>" id="altera_preco">
                    </div>
					
					<div class="form-group">
                        <label for="txtqtde">Quantidade em Estoque</label>
                        <input type="number" class="form-control" name="altera_quantidade" value="<?php echo $exibe['quantidade_produto']; ?>" required id="altera_quantidade">
					</div>

                    <div class="form-group">
                        <label for="txtqtde">Nome da imagem:</label>
                        <input type="text" name="altera_nome_imagem" value="<?php echo $exibe['imagem_produto']; ?>"  class="form-control" required id="altera_nome_imagem">
					</div>
					
                    <div class="form-group">
                    <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']);?>" class="img-responsive imgm" id="altera_imagem">
                    </div>

                    <button type="submit" class="btn btn-lg btn-default">
                        <span class="glyphicon glyphicon-pencil"> Alterar </span>
                    </button>
				
			    </form>
			</div>
		</div>
	</div>
    
	
<?php include 'rodape.html' ?>

</body>
</html>