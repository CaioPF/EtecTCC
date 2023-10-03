<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoa Fisica</title>
</head>
<body>
    <?php 
        include 'conexao.php';

        //variavel consulta  vai receber  variavel $mysql que é a variavel da conexão com o banco de dados na pg conexão.php
        $consulta = $mysqli->query('select * from pessoa_fisica');

        // variavel $exibe  recebrá o resultado da $consulta  em forma de uma matriz tabela 
        while($exibe = $consulta->fetch_assoc()){
        echo '<br>';
        echo $exibe ['nome_pf'].'<br>';
        echo $exibe ['email_pf'].'<br>';
        echo $exibe ['nascimento_pf'].'<br>';
        
        }
    ?>
</body>
</html>