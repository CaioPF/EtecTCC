<?php 
    include 'conexao.php';

    $id_login = $_GET['id_login'];
    $exclusaoSucesso = true;

    $sqlDeletePessoa= "DELETE FROM pessoa WHERE id_login = $id_login";
    $resultDeletePessoa = $mysqli->query($sqlDeletePessoa);
    if(!$resultDeletePessoa) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela pessoa: " . $mysqli->error;
    }

    $sqlDeleteUsuario= "DELETE FROM tipo_usuario WHERE id_login = $id_login";
    $resultDeleteUsuario = $mysqli->query($sqlDeleteUsuario);
    if(!$resultDeleteUsuario) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela pessoa_fisica: " . $mysqli->error;
    }

    // Verificar e excluir registros relacionados na tabela pessoa_fisica
    $sqlDeletePessoaFisica = "DELETE FROM pessoa_fisica WHERE id_login = $id_login";
    $resultDeletePessoaFisica = $mysqli->query($sqlDeletePessoaFisica);
    if(!$resultDeletePessoaFisica) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela pessoa_fisica: " . $mysqli->error;
    }

    $sqlDeletePessoaJuridica = "DELETE FROM pessoa_juridica WHERE id_login = $id_login";
    $resultDeletePessoaJuridica  = $mysqli->query($sqlDeletePessoaJuridica );
    if(!$resultDeletePessoaJuridica) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela pessoa_juridica: " . $mysqli->error;
    }

    $sqlDeleteFuncionario = "DELETE FROM funcionario WHERE id_login = $id_login";
    $resultDeleteFuncionario = $mysqli->query($sqlDeleteFuncionario);
    if(!$resultDeleteFuncionario) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela funcionario: " . $mysqli->error;
    }

    $sqlDeleteEndereco = "DELETE FROM endereco WHERE id_login = $id_login";
    $resultDeleteEndereco = $mysqli->query($sqlDeleteEndereco);
    if(!$resultDeleteEndereco) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela endereco: " . $mysqli->error;
    }

    $sqlDeleteTelefone = "DELETE FROM telefone WHERE id_login = $id_login";
    $resultDeleteTelefone = $mysqli->query($sqlDeleteTelefone);
    if(!$resultDeleteTelefone) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registros na tabela Telefone: " . $mysqli->error;
    }

    

    // Verificar e excluir registros relacionados em outras tabelas (pessoa_juridica, funcionario, endereco, telefone, etc.)
    // ...

    // Excluir o registro na tabela loginn
    $sqlDeleteLogin = "DELETE FROM loginn WHERE id_login = $id_login";
    $resultDeleteLogin = $mysqli->query($sqlDeleteLogin);
    if(!$resultDeleteLogin) {
        $exclusaoSucesso = false;
        echo "Erro ao excluir registro na tabela loginn: " . $mysqli->error;
    }

    if($exclusaoSucesso) {
        header('Location: ListaUsuarios.php');
    }
?>
