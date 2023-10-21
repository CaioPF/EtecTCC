<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Protect King</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<?php include 'links.php'; ?>
	
	<style>
        .navbar{
            margin-bottom: 0;
        }
	</style>
</head>

<body>	
	<?php
	
	session_start();
	
	if (empty($_SESSION['ID'])) {
		header('location:login.php');
	}
	
	include 'conexao.php';	
	include 'menu.php';

	//jogando na variavel $ticket_compra o ticket recebido pelo parametro
	$ticket_compra = $_GET['ticket'];
	
	//Criando select pelo ticket recebido que foi armazenado na variavel $ticket_compra
	$consulta_vendas = $mysqli->query("SELECT * FROM vw_venda WHERE ticket = $ticket_compra;");
	?>

	<div class="row" style="margin-top: 15px;">
		<h1 class="text-center">Compra: <?php echo $ticket_compra ?></h1>
	</div>

    <div class="container-fluid">
        <div class="row" style="margin-top: 15px;">
            <h1>Histórico de compras</h1>
        </div>

        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1"><h4>Data</h4></div>
            <div class="col-sm-2"><h4>Ticket</h4></div>
            <div class="col-sm-5"><h4>Produto</h4></div>
            <div class="col-sm-1"><h4>Quantidade</h4></div>
            <div class="col-sm-2"><h4>Valor total</h4></div>
        </div>

        <?php 
        $total = 0;

        while($exibe_venda = $consulta_vendas->fetch_assoc()){ 
           $total += $exibe_venda["valor_total"];
        ?>

        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y', strtotime($exibe_venda['data_vendas']));?></div>
            <div class="col-sm-2"> <?php echo $exibe_venda['ticket'];?> </div>
            <div class="col-sm-5"> <?php echo $exibe_venda['nome_produto'];?> </div>
            <div class="col-sm-1"> <?php echo $exibe_venda['quantidade_produto_vendas'];?> </div>
            <div class="col-sm-2" > <?php echo number_format($exibe_venda['valor_total'],2,',','.');?> </div>	
        </div>	
    
        <?php }?>
    </div>
	
<?php include 'rodape.html'; ?>
</body>
</html>