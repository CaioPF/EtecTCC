<!-- TEM UMA MENSAGEM DE ERRO QUE NAO SEI O MOTIVO DELA ESTAR ALI MAS O CÓDIGO ESTA FUNCIONANDO NORMALMENTE -->


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
        .cont-compra 
        {
            background-color:#daa520 ;
            color: #ffffff;
        }
        .fin-compra
        {
            border-color: #daa520;
            background-color: #ffffff;
            color: #daa520;
        }
        body
{
  background-color: #f4f4f4 !important;
}

	</style>
</head>

<body>
<?php
include 'conexao.php';
include 'menu.php';

?>


<?php
 // verificando se o codigo do produto NÃO está vazio
if (!empty($_GET['id_produto'])) {

    // inserindo o código do produto na variável $codigo_produto
    $codigo_produto=$_GET['id_produto'];
    
    // se a sessão carrinho não estiver preenchida(setada)
    if (!isset($_SESSION['carrinho'])) {
        // será criado uma sessão chamado carrinho para receber um vetor
        $_SESSION['carrinho'] = array();
    }
    // se a variavel $codigo_produto não estiver setado(preenchida)
    if (!isset($_SESSION['carrinho'][$codigo_produto])) {
        // será adicionado um produto ao carrinho
        $_SESSION['carrinho'][$codigo_produto]=1;
    }
    // caso contrario, se ela estiver setada, adicione novos produtos
    else {
        $_SESSION['carrinho'][$codigo_produto]+=1;
    }

    // incluindo o arquivo 'carrinhoif.php'
    include 'carrinhoif.php';
} 
else {
    //mostrando o carrinho	vazio	
    include 'carrinhoif.php';
}?>

    <div class="row text-center" style="margin-top: 15px;">
        <a href="index.php"><button class="btn btn-lg cont-compra ">Continuar Comprando</button></a>

        <?php if(count($_SESSION['carrinho']) > 0) { ?>
        <a href="pagamento.php"><button class="btn btn-lg fin-compra">Continuar</button></a>
        
        
        <?php }?>
    </div>
</div>

    </br></br></br></br>
<?php include 'rodape.html'; ?>
</body>
</html>