<?php
$nomeserver = "127.0.0.1"; /*na configuração da sua conexao vc deve colocar o HOSTNAME*/
$usuario = "root"; /*Por padrão todo usuario do banco de dados(MySQL) é root*/
$senha = ""; /*Se o banco de dados(MySQL) não tem senha então deixa as aspas em branco*/
$banco = "tcc_ecommerce"; /*Esse é o nome do banco onde estamos usando para o tcc */

// Cria a conexão
$mysqli = new mysqli($nomeserver, $usuario, $senha, $banco);

// Verifica a conexão
if ($mysqli->connect_error) {
    echo "Falha ao conectar:(" . $mysqli->connect_error . ")" . $mysqli->connect_errno;
}
else
    //echo "Conectado ao banco de dados";
?>