<!--Esse arquivo faz com que o usuario saia do seu parfil da página-->
<?php 
session_start();
session_destroy();
header('location:index.php');
?>