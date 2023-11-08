<?php

  include'conexao.php';
  if(isset($_POST['update']))
  {
    $id_pf = $_POST['id_pf'];
    $nome_pf = $_POST['nome_pf'];
    $sobrenome_pf = $_POST['sobrenome_pf'];
    $nascimento_pf = $_POST['nascimento_pf'];
    $cpf_pf= $_POST['cpf_pf'];

    $sqlUpdate = "UPDATE pessoa_fisica SET nome_pf='$nome_pf',sobrenome_pf='$sobrenome_pf', nascimento_pf='$nascimento_pf', cpf_pf='$cpf_pf'
    WHERE id_pf = '$id_pf'";


    $result = $mysqli->query($sqlUpdate);
  }
  header('Location: listaClientePf.php');
?>