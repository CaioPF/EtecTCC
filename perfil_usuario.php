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
// session_start();

// if(empty($_SESSION['ID'])) {
//     header('location:login.php');
// }

include 'conexao.php';	
include 'menu.php';



$codigo_usuario = $_SESSION['ID'];

$consulta_vendas = $mysqli->query("SELECT * FROM vw_venda WHERE login_vendas = '$codigo_usuario' GROUP BY ticket");
?>
	
<div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
        <h1>Histórico de compras</h1>
    </div>

	<div class="row" style="margin-top: 15px;">
		<div class="col-sm-1 col-sm-offset-1"><h4>Data</h4></div>
		<div class="col-sm-2"><h4>Ticket</h4></div>
	</div>

    <?php while($exibe_venda = $consulta_vendas->fetch_assoc()){  ?>

    <div class="row" style="margin-top: 15px;">
        <div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y', strtotime($exibe_venda['data_vendas']));?></div>
        <div class="col-sm-2"><a href="ticket.php?ticket='<?php echo $exibe_venda['ticket'];?>'">
            <?php echo $exibe_venda['ticket'];?></a></div>
    </div>	
   
	<?php }?>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
<?php include 'rodape.html'; ?>
</body>
</html>