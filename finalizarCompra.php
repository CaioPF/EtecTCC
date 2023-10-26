<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect King</title>
</head>
<body>
<?php

include 'conexao.php';
include 'menu.php';

// verificando se usuário está logado
if(empty($_SESSION['ID'])){
		
    header('location:login.php'); // enviando para formlogon.php
    
}

$data = date('Y-m-d');  // variável que vai pegar a data do dia (ano mês dia - padrão do MySQL)
$ticket = uniqid();  // gerando um ticket com função uniqid(); gera um ID único
$codigo_usuario = $_SESSION['ID'];  // recebendo o código do usuário logado

// Certifique-se de que $_SESSION['carrinho'] está definido e é um array
if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
    // Criando um loop para a sessão carrinho que recebe o código e a quantidade
    foreach ($_SESSION['carrinho'] as $codigo_produto => $quantidade_produto)  {
        $consulta = $mysqli->query("SELECT preco_produto FROM produto WHERE id_produto ='$codigo_produto'");
        $exibe = $consulta->fetch_assoc();
        $preco = $exibe['preco_produto'];

        $inserir = $mysqli->query("INSERT INTO vendas(ticket, login_vendas, id_produto_vendas, quantidade_produto_vendas, preco_vendas, data_vendas)  VALUES
        ('$ticket', '$codigo_usuario', '$codigo_produto', '$quantidade_produto', '$preco', '$data')");

        unset($_SESSION['carrinho'][$codigo_produto]);
    }
}
include 'fim.php';
?>

</body>
</html>