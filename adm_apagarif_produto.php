<?php

include 'conexao.php';  // conexao com banco de dados

$id_apagar_produto = $_GET['id'];  // pegando o id que é enviado pelo botão excluir que esta na pagina lista.php

// criando consulta pelo id que foi pego
$consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto ='$id_apagar_produto'");

//criando um array para exibir os dados
$exibe = $consulta->fetch_assoc();

// comando para excluir o registro pelo cd_livro que foi recebido na variavel.
$excluir = $mysqli->query("DELETE FROM produto WHERE id_produto ='$id_apagar_produto'");

//redirecionado usuario para página lista.php
header('location:adm_apagar_produto.php');
?>
