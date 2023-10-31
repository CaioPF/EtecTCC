<?php
include 'conexao.php';	

$recebe_email = $_POST['txtemail'];

$consulta_email = $mysqli->query("SELECT loginn.email, loginn.senha, pessoa_fisica.nome_pf
                                  FROM loginn
                                  INNER JOIN pessoa_fisica ON loginn.id_login = pessoa_fisica.id_login
                                  WHERE loginn.email = '$recebe_email';");

                                if ($consulta_email->num_rows == 0) {

                                    header('location:erro_recuperar_senha.php');
                                }
                                else {
                                    echo'Esse email está cadastrado.';
                                }


?>