<?php 
    include 'conexao.php';

    $id_pj = $_GET['id_pj'];

    $exclusaoSucesso = true;

    $sqlDeleteLogin = "DELETE FROM pessoa_juridica WHERE id_pj = $id_pj";

    $resultDeleteLogin = $mysqli->query($sqlDeleteLogin);

    if(!$resultDeleteLogin) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registro na tabela loginn: " . $mysqli->error;
    }

    if($exclusaoSucesso) {
        header('Location: ListaClientePj.php');
    }
?>
