<?php

  include'conexao.php';
  if(isset($_POST['update']))
  {
    $id_login = $_POST['id_login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
    $sqlUpdate = "UPDATE loginn SET email='$email', senha='$senha'
    WHERE id_login='$id_login'";

    $result = $mysqli->query($sqlUpdate);
  }
  header('Location: listaUsuarios.php');
?>