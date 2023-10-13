<?php 
include 'conexao.php';

session_start(); // Inicia a sessão

$Lusuario = $_POST['txtemail'];
$Lsenha = $_POST['txtsenha'];

// Execute a consulta SQL para verificar as credenciais de login
$validacao = $mysqli->query("SELECT loginn.id_login, loginn.email, loginn.senha, tipo_usuario.tipo_usuario
                             FROM loginn
                             INNER JOIN tipo_usuario ON loginn.id_login = tipo_usuario.id_login
                             WHERE loginn.email = '$Lusuario' AND loginn.senha = '$Lsenha'");

if (mysqli_num_rows($validacao) == 1) {
   $exibeUsuario = $validacao->fetch_assoc();

   $_SESSION['ID'] = $exibeUsuario['id_login'];
   
   if ($exibeUsuario['tipo_usuario'] == 'Cliente') {
       $_SESSION['Status'] = 'Cliente';
   } 
   else {
       $_SESSION['Status'] = 'ADM';
   }
   
   header('location: index.php');
}
 else {
    header('location: erro_login.php');
}
?>
