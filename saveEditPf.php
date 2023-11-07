<?php

  include'conexao.php';
  if(isset($_POST['Id_pf']))
  {
  
    $nome_pf = $_POST['nome_pf'];
    $nascimento_pf = $_POST['nascimento_pf'];
    $cpf_pf= $_POST['cpf_pf'];

    $sql = "UPDATE pessoa_fisica SET nome_pf='$nome_pf', nascimento_pf='$nascimento_pf, cpf_pf='$cpf_pf'
    WHERE id_pf = '$id_pf'";

    $result = $mysqli->query($sql);
  }
  header('Location: listaClientePf.php');
?>