<?php 
session_start();

$codigo_produto = $_GET['id_produto'];

unset($_SESSION['carrinho'][$codigo_produto]);

header('location:carrinho.php');

?>  