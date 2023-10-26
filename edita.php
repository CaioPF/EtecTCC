<?php 
include 'conexao.php';
include 'cadastro_if.php';

/* $id = $_GET['id'];
$sql = "SELECT * FROM pessoa_juridica WHERE id_pj=$id";

$result = $mysqli->query($sql);

    if($result->num_rows > 0)
    {
        while($consulta_usuario = mysqli_fetch_assoc($result))
        {
            $nome = $consulta_usuario['nome_pf'];
            $sobrenome =$consulta_usuario['sobrenome_pf'];
            $nascimento =$consulta_usuario['nascimento_pf'];
            $cpf = $consulta_usuario['cpf_pf'];
            $estado =$consulta_usuario['estado_pf'];
            $cidade =$consulta_usuario['cidade_pf'];
            $bairro = $consulta_usuario['bairro_pf'];
            $cep = $consulta_usuario['cep_pf'];
            $logradouro =$consulta_usuario['logradouro_pf'];
            $numero =$consulta_usuario['numero_pf'];
            $complemento = $consulta_usuario['complemento_pf'];
            $nomeFantasia =$consulta_usuario['nome_fantasia_pj'];
            $cnpj = $consulta_usuario['cnpj_pj'];
            $abertura = $consulta_usuario['abertura_pj'];
            $funcionario =$consulta_usuario['funcionario_comprador'];
            $telefonepj =$consulta_usuario['telefone_pj'];
            $estadopj =$consulta_usuario['estado_pj'];
            $cidadepj = $consulta_usuario['cidade_pj'];
            $bairropj = $consulta_usuario['bairro_pj'];
            $ceppj = $consulta_usuario['cep_pj'];
            $lagradouro =$consulta_usuario['logradouro_pj'];
            $numeropj = $consulta_usuario['numero_pj'];
        }
    }
    else
    {
        header('Location: cadastro.php');
    }
   */

?>





<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Protect King</title>

    <?php include 'links.php'; ?>
        
    
    <!--<script src="jquery.mask.js"></script>

    <script>
    //a masca nao está funcionando.
    $(document).ready(function(){
        $("#mask_cep").mask("00000-000");
        $("#mask_telefone").mask("00000-0000");
        $("#mask_cpf").mask("000.000.000-00");
        });
    </script> -->

    <style>
        .erro {
        color: red;
        font-size: 14px;
        }
    
        body
        {
            width: 100vw;
            height: 100vh;
        }
        .content
        {
            width: 100vw;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }
        .cad_usu
        {
            width: 30vw;
            height:70vh;
            background-color: grey;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1.5px solid grey;
            
        }
        .btn_cad
        {
            width: 7vw;
            height: 3vh;
            border-radius: 50px;
            background-color: orange;
            font-size: 15px;
            font-weight: bolder;
        }
       
    </style>
    

</head>

<body>
    
        <!------------------------------------------------------------------------------------------------->
        <!--Menu-->
        <div class="nav">
        <!-- <nav class="navbar navbar-inverse"> Apague o inverse para estar alterando a cor do menu de navegação-->
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
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="content">
    
        <img src="foto_produto/logo/logo-coroa.svg" alt="logotipo kings">
        <form method="POST" action="cadastro_if.php">

            <!-- Campos específicos para Pessoa Física -->
            <div id="id_pf" style="display: none;">
                <label for="nome_pf">Nome:</label>
                <input type="text" name="nome_pf"><br>

                <label for="sobrenome_pf">Sobrenome:</label>
                <input type="text" name="sobrenome_pf"><br>

                <label for="nascimento_pf">Data de Nascimento:</label>
                <input type="date" name="nascimento_pf"><br>

                <label for="cpf_pf">CPF:</label>
                <input type="text" name="cpf_pf" maxlength="11" id="mask_cpf">
                <div id="cpf-erro" class="erro" style="display: none;">CPF inválido.</div><br>

                <label for="telefone_pf">Telefone:</label>
                <input type="text" name="telefone_pf_ddd" placeholder="DDD" maxlength="3">
                <input type="text" name="telefone_pf_numero" placeholder="Número" maxlength="11" id="mask_telefone"><br>

                <label for="estado_pf">Estado:</label>
                <select name="estado_pf">
                    <option value=""></option>
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

                <label for="cidade_pf">Cidade:</label>
                <input type="text" name="cidade_pf"><br>

                <label for="bairro_pf">Bairro:</label>
                <input type="text" name="bairro_pf"><br>

                <label for="cep_pf">CEP:</label>
                <input type="text" name="cep_pf" id="mask_cep"><br>

                <label for="logradouro_pj">Rua:</label>
                <input type="text" name="logradouro_pf"><br>

                <label for="numero_pf">Número:</label>
                <input type="text" name="numero_pf"><br>

                <label for="complemento_pf">Complemento:</label>
                <input type="text" name="complemento_pf" placeholder="Opcional"><br>
          

            

                <!-- Campos de email e senha (inicialmente ocultos) -->
             id="email_senha_fields" style="display: none;">
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="@gmail.com" required>
                <div id="email-erro" class="erro" style="display: none;">Email inválido.</div><br>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required><br>

                <label for="confirmar_senha">Confirmar Senha:</label>
                <input type="password" name="confirmar_senha" id="confirmar_senha" required><br>
                <div id="senha-erro" class="erro" style="display: none;">Confirmação de senha incorreta.</div>
            </div>

            <input class="btn_cad" type="submit" value="Cadastrar-se" id="cadastrar" style="display: none;">
        </form>
    
    </div>
        <!-- <script>
            // Função para mostrar/ocultar campos com base no tipo de pessoa selecionado
            function showFields(id) {
                // Oculta todos os campos
                document.getElementById('email_senha_fields').style.display = 'none';
                document.getElementById('pessoa_fisica_fields').style.display = 'none';
                document.getElementById('pessoa_juridica_fields').style.display = 'none';

                // Mostrar os campos do tipo selecionado
                document.getElementById(id).style.display = 'block';

                // Mostrar o botão de cadastro somente quando uma das opções for selecionada
                document.getElementById('cadastrar').style.display = 'block';

                // Mostra os campos de email e senha somente quando uma das opções for selecionada
                if (id === 'pessoa_fisica_fields' || id === 'pessoa_juridica_fields') {
                    document.getElementById('email_senha_fields').style.display = 'block';
                }
            }

            function validarSenha() {
                var senha = document.getElementById("senha").value;
                var confirmarSenha = document.getElementById("confirmar_senha").value;
                var senhaErro = document.getElementById("senha-erro");

                if (senha !== confirmarSenha) {
                    senhaErro.style.display = "block";
                    return false;
                } else {
                    senhaErro.style.display = "none";
                    return true;
                }
            }

        </script> -->
    <?php include 'rodape.html' ?>
</body>
</html>