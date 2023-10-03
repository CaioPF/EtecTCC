<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Inserir dados na tabela pessoa
    $sql = "INSERT INTO loginn (email, senha) 
            VALUES ('$email', '$senha')";

    $mysqli->query($sql);   

    // Obter o ID da pessoa recém-inserida
    $id_login = $mysqli->insert_id;

    $nome_func = $_POST["nome_func"];
    $sobrenome_func = $_POST["sobrenome_func"];
    $nascimento_func = $_POST["nascimento_func"];
    $cpf_func = $_POST["cpf_func"];
    $cargo_func = $_POST["cargo_func"];

    $estado_func = $_POST["estado_func"];
    $cidade_func = $_POST["cidade_func"];
    $bairro_func = $_POST["bairro_func"];
    $cep_func = $_POST["cep_func"];
    $logradouro_func = $_POST["logradouro_func"];
    $numero_func = $_POST["numero_func"];
    $complemento_func = $_POST["complemento_func"];

    $telefone_func_ddd = $_POST["telefone_func_ddd"];
    $telefone_func_numero = $_POST["telefone_func_numero"];

    $tipo_usuario = "funcionario";

    $sql_tipo_usuario = "INSERT INTO tipo_usuario (tipo_usuario, id_login)
                         VALUES ('$tipo_usuario', $id_login)";
            
                         $mysqli->query($sql_tipo_usuario);

    //---------------------------------------------------------------------------------------------------------------------

    $funcionario = "INSERT INTO funcionario (nome_func, sobrenome_func, nascimento_func, 
                                cpf_func, cargo_func, id_login)
                    VALUES ('$nome_func', '$sobrenome_func', '$nascimento_func', '$cpf_func', '$cargo_func', $id_login)";

                    $mysqli->query($funcionario);

    //--------------------------------------------------------------------------------------------------------------------
    $endereco = "INSERT INTO endereco (estado, cidade, bairro, cep, logradouro, numero, complemento, id_login)
                 VALUES ('$estado_func', '$cidade_func', '$bairro_func', '$cep_func', '$logradouro_func', 
                         '$numero_func', '$complemento_func', $id_login)";

                 $mysqli->query($endereco);

    //--------------------------------------------------------------------------------------------------------------------

    $telefone = "INSERT INTO telefone (ddd, numero, id_login)
                 VALUES ('$telefone_func_ddd', '$telefone_func_numero', $id_login)";

                 $mysqli->query($telefone);

    //--------------------------------------------------------------------------------------------------------------------

    header("Location: login.php"); // Substitua "login.php" pelo URL da sua página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionario</title>

    <?php include 'links.php'; ?>

</head>
<body>

<!------------------------------------------------------------------------------------------------->
<!--Menu-->
<div class="nav">
    <nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
    <div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
        
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>              <!--Esse é o botão hamburguer que aparece quando o site-->
            <span class="icon-bar"></span>                              <!-- nao está em tela cheia-->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Protector Kings</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php  include 'session_start.php';?>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        </div>
    </div>
    </nav>
</div>
<!-------------------------------------------------------------------------------------------------->

<h1>Cadastro de funcionário</h1>
<form method="POST" action="">
    <div name="tipo_adm" value="3">
        <label for="nome_func">Nome:</label>
        <input type="text" name="nome_func"><br>

        <label for="sobrenome_func">Sobrenome:</label>
        <input type="text" name="sobrenome_func"><br>

        <label for="nascimento_func">Data de Nascimento:</label>
        <input type="date" name="nascimento_func"><br>

        <label for="cpf_func">CPF:</label>
        <input type="text" name="cpf_func" maxlength="11"><br>

        <label for="telefone_func">Telefone:</label>
        <input type="text" name="telefone_func_ddd" placeholder="DDD" maxlength="3">
        <input type="text" name="telefone_func_numero" placeholder="Número" maxlength="11"><br>

        <label for="estado_func">Estado:</label>
        <select name="estado_func">
        <option value="AC">(AC)</option>
            <option value="AL">(AL)</option>
            <option value="AP">(AP)</option>
            <option value="AM">(AM)</option>
            <option value="BA">(BA)</option>
            <option value="CE">(CE)</option>
            <option value="DF">(DF)</option>
            <option value="ES">(ES)</option>
            <option value="GO">(GO)</option>
            <option value="MA">(MA)</option>
            <option value="MT">(MT)</option>
            <option value="MS">(MS)</option>
            <option value="MG">(MG)</option>
            <option value="PA">(PA)</option>
            <option value="PB">(PB)</option>
            <option value="PR">(PR)</option>
            <option value="PE">(PE)</option>
            <option value="PI">(PI)</option>
            <option value="RJ">(RJ)</option>
            <option value="RN">(RN)</option>
            <option value="RS">(RS)</option>
            <option value="RO">(RO)</option>
            <option value="RR">(RR)</option>
            <option value="SC">(SC)</option>
            <option value="SP">(SP)</option>
            <option value="SE">(SE)</option>
            <option value="TO">(TO)</option>
        </select><br>

        <label for="cidade_func">Cidade:</label>
        <input type="text" name="cidade_func"><br>

        <label for="bairro_func">Bairro:</label>
        <input type="text" name="bairro_func"><br>

        <label for="cep_func">CEP:</label>
        <input type="text" name="cep_func"><br>

        <label for="logradouro_func">Rua:</label>
        <input type="text" name="logradouro_func"><br>

        <label for="numero_func">Número:</label>
        <input type="text" name="numero_func"><br>

        <label for="complemento_func">Complemento:</label>
        <input type="text" name="complemento_func" placeholder="Opcional"><br>
    </div>

    <label for="cargo_func">Cargo</label>
        <select name="cargo_func" id="cargo_func">
            <option>Administrativo</option>
            <option>Atendente</option>
            <option>Vendas</option>
            <option>Recursos Humanos (RH)</option>
            <option> TI (Tecnologia da Informação)</option>
            <option>Finanças</option>
            <option>Marketing</option>
            <option>Produção</option>
            <option>Logística</option>
            <option>Suporte Técnico</option>
        <select></br> 

    <div id="email_senha_fields">
        <label for="email">Email:</label>
        <input type="email" name="email" required></br> 


        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        
        <!--<label for="confirmar_senha">Confirmar Senha:</label>
        <input type="password" name="confirmar_senha" id="confirmar_senha" required><br>-->
    </div>

    <input type="submit" value="Cadastrar" id="cadastrar">
</form>

</body>
</html>