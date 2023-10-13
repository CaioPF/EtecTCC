<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect King</title>

    <?php  
    include 'conexao.php';
    include 'adm_menu.php';
    ?>
</head>

<body>
    <?php 
    //se o usuário tentar acessar um dos arquivos pela URL ou sem estar logado como ADM, ele será redirecionado para a index
    if (empty($_SESSION['Status']) || $_SESSION['Status'] != 'ADM'){
        header('location: index.php');
    } 
    ?>

    <h1>Estamos em manutenção na pagina apagar produto</h1>
    
<?php include 'rodape.html'; ?>
</body>
</html>