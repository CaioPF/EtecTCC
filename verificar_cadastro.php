<?php
include 'conexao.php';

// Suponho que você já tenha uma conexão $mysqli estabelecida na inclusão do arquivo 'conexao.php'.

$vemail = $_POST['email'];
$vcpf = $_POST['cpf_pf'];

// Use prepared statements para evitar injeção de SQL
$stmt = $mysqli->prepare("SELECT loginn.email, pessoa_fisica.cpf_pf
                          FROM loginn
                          INNER JOIN pessoa_fisica ON loginn.id_login = pessoa_fisica.id_login
                          WHERE loginn.email = ? OR pessoa_fisica.cpf_pf = ?");

// Esta linha vincula parâmetros à consulta preparada, indicando que estamos usando dois parâmetros de tipo string (representados pela letra "s"). Os valores das variáveis $vemail e $vcpf serão inseridos na consulta como strings.
$stmt->bind_param("ss", $vemail, $vcpf);

// Essa linha executa a consulta preparada com os valores dos parâmetros vinculados, substituindo-os na consulta e realizando a execução da consulta SQL.
$stmt->execute();

// O resultado da consulta preparada é armazenado no objeto $stmt. Isso permite que você acesse e processe os resultados da consulta posteriormente, se necessário.
$stmt->store_result();

if ($stmt->num_rows == 1) {
    echo 'Email ou CPF já cadastrado';
} else {
    // Quando nenhum registro for encontrado pode ser inserido uma mensagem.
}

// Fecha a declaração e a conexão com o banco de dados após o uso.
$stmt->close();
$mysqli->close();
?>