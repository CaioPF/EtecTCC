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
                <h1>Detalhes do Produto</h1>
                <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']);?>" class="img-responsive imgm">
                <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
                <div class="col-sm-4 col-sm-offset-1" style="margin-top: 10px;"><img src="https://placehold.it/900x640" class="img-responsive"></div>
            </div>

            <div class="col-sm-7">
                <h1><?php echo $exibe['nome_produto']; ?></h1>
                <p><?php echo $exibe['descricao_produto']; ?></p>
                <p>R$ <?php echo number_format($exibe['preco_produto'], 2, ',', '.'); ?></p>

                <div class="text-center" style="margin-top: 1.5%"; margin-bottom: 1%>
                <?php if ($exibe['quantidade_produto'] > 0) { ?>

                <a href="carrinho.php?id_produto=<?php echo $exibe['id_produto']; ?>">
                <button class="btn btn-lg btn-success" style="margin-left: -85%;">Comprar</button>	
                </a>

                <?php  }
                        else { ?> 

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
} ?>

<?php include 'rodape.html'; ?>
</body>
</html>
