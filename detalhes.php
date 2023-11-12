<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Protector Kings</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="botao_comprar.css">

<?php include 'links.php'; ?>

<style> 
.navbar {
    margin-bottom: 0;
}

.butao_comprar 
{
 width: 9vw;
 height: 3vw ;
 border-radius: 10%;
 margin-left: -85%;  
 border-color:  #daa250;
 background-color: #daa520;
 color: white;
 box-shadow: none;
 font-family: Arial, Helvetica, sans-serif;
 font-size: large;
}

.butao_comprar ::before{
  z-index: 1;
  background-color: rgba(97, 97, 97, 0.1);
  transition: all 0.3s;
}

.butao_comprar :hover::before {
  opacity: 0;
  transform: scale(0.5, 0.5);
} 

</style>
</head>

<body>	
<?php
include 'conexao.php';
include 'menu.php';


// Resto do seu código aqui

// evita que o usuario acesse o arquivo "detalhes.php" pela url e cause algum erro
if (!empty($_GET['id_produto'])) {
	
    // o método $_GET é para puxar as informações da URL, o "id_produto" está vindo da URL
    $id_produto = $_GET['id_produto'];

    $consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto = '$id_produto'");
    $exibe = $consulta->fetch_assoc();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

                </br></br></br>
                <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']);?>" class="img-responsive imgm">
                <!-- <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
                <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div> -->
            </div>

            <div class="col-sm-7"></br></br>
                <h1><?php echo $exibe['nome_produto']; ?></h1>
                <p><?php echo $exibe['descricao_produto']; ?></p>
                
                </br>
                <div style=    "display: inline-flex; width:50vw; ">
                    <div style="width:50%"><h2>R$ <?php echo number_format($exibe['preco_produto'], 2, ',', '.'); ?></h2></div>

                    <div style="width:50%"><h3>Quantidade em estoque: <?php echo number_format($exibe['quantidade_produto'])?></h3></div>
                </div>

                <div class="text-center" style="margin-top: 1.5%"; margin-bottom: 1%>
                <?php if ($exibe['quantidade_produto'] > 0) { ?>

                <a href="carrinho.php?id_produto=<?php echo $exibe['id_produto']; ?>">
                <button class="butao_comprar" style="margin-top: 7%;">Comprar</button>	
                </a>

                <?php  }
                        else { ?> 
                
                </br>
                <button class="btn btn-lg btn-danger" style="margin-left: -85%;" disabled>
                    <span class="glyphicon glyphicon-remove-circle" > Esgotado</span>
                </button>

                <?php  } ?>
                </div>

            </div>
        </div>
    </div>
<?php } else {
    header("location:index.php");
    exit;
} ?></br></br></br></br></br></br>

<?php include 'rodape.html'; ?>
</body>
</html>
