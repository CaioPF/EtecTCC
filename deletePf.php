<?php 
    include 'conexao.php';

    $id_pf = $_GET['id_pf'];
    $exclusaoSucesso = true;

    
    

    // Verificar e excluir registros relacionados em outras tabelas (pessoa_juridica, funcionario, endereco, telefone, etc.)
    // ...

    // Excluir o registro na tabela loginn
    $sqlDeleteLogin = "DELETE FROM pessoa_fisica WHERE id_pf = $id_pf";
    $resultDeleteLogin = $mysqli->query($sqlDeleteLogin);
    if(!$resultDeleteLogin) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registro na tabela loginn: " . $mysqli->error;
    }

    if($exclusaoSucesso) {
        header('Location: ListaClientePf.php');
    }
?>
