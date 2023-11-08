<?php

  include'conexao.php';
  if(isset($_POST['update']))
  {
    $id_pj = $_POST['id_pj'];
    $nome_fantasia_pj = $_POST['nome_fantasia_pj'];
    $razao_social_pj = $_POST['razao_social_pj'];
    $cnpj_pj = $_POST['cnpj_pj'];
    $abertura_pj = $_POST['abertura_pj'];
  
    $sqlUpdate = "UPDATE pessoa_juridica SET nome_fantasia_pj='$nome_fantasia_pj', razao_social_pj='$razao_social_pj', cnpj_pj='$cnpj_pj',  abertura_pj='$abertura_pj'
    WHERE id_pj='$id_pj'";

    $result = $mysqli->query($sqlUpdate);
  }
  header('Location: listaClientePj.php');
?>