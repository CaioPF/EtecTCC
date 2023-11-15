<?php
include 'conexao.php';
include 'cadastro_if.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Protect King</title>

    <link rel="stylesheet" href="login.css">

    <?php include 'links.php'; ?>


    <script src="jquery.mask.js"></script>

    <script>
        //a masca nao está funcionando.
        $(document).ready(function () {
            $("#mask_cep").mask("00000-000");
            $("#mask_telefone").mask("00000-0000");
            $("#mask_cpf").mask("000.000.000-00");

            $("#mask_cnpj_pj").mask("00.000.000/0000-00");
            $("#mask_telefone_pj").mask("00000-0000");
            $("#mask_cep_pj").mask("00000-000");
            $("#mask_abertura_pj").mask("00/00/0000");
        });
    </script>
    <style>
    .botao-cads{
    background-color: #daa520;
    color: white;
		}
    </style>

</head>

<body>

    <!------------------------------------------------------------------------------------------------->
    <!--Menu-->
    <div class="nav">
        <nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
            <div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <!--Esse é o botão hamburguer que aparece quando o site-->
                        <span class="icon-bar"></span> <!-- nao está em tela cheia-->
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Protector Kings</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php include 'session_start.php'; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="content">
        <div class="container-fluid">
            <div class="bvvvxW">
                <img src="foto_produto/logo/logo-coroa.svg" class="logo">
                <form method="POST" action="cadastro_if.php" onsubmit="return validarSenha();">
                    <label>Tipo de Pessoa:</label></br>
                    <input type="radio" name="tipo_pessoa" value="1" required
                        onclick="showFields('pessoa_fisica_fields')"> Pessoa Física
                    <input type="radio" name="tipo_pessoa" value="2" required
                        onclick="showFields('pessoa_juridica_fields')"> Pessoa Jurídica<br>

                    <!-- Campos específicos para Pessoa Física -->
                    <div id="pessoa_fisica_fields" style="display: none;">
                        <label for="nome_pf">Nome</label>
                        <input type="text" name="nome_pf" class="form-control">

                        <label for="sobrenome_pf">Sobrenome</label>
                        <input type="text" name="sobrenome_pf" class="form-control"><br>

                        <label for="nascimento_pf">Data de Nascimento</label>
                        <input type="date" name="nascimento_pf" class="form-control"><br>

                        <label for="cpf_pf">CPF *</label>
                        <input type="text" name="cpf_pf" maxlength="11" id="mask_cpf" class="form-control">
                        <div id="cpf-erro" class="erro" style="display: none;">CPF inválido.</div><br>
                        
                        <label for="telefone_pf">Telefone</label><br>
                        <div style="display: inline-flex">
                        <input type="text" name="telefone_pf_ddd" placeholder="DDD" maxlength="3" class="form-control" style="width:5vw;">
                        <input type="text" name="telefone_pf_numero" placeholder="Número" maxlength="11"id="mask_telefone" class="form-control" style="width:20vw;"><br>
                        </div>
                        <br>
                        <label for="estado_pf">Estado *</label>
                        <select name="estado_pf" class="form-control">
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

                        <label for="cidade_pf">Cidade *</label>
                        <input type="text" name="cidade_pf" class="form-control"><br>

                        <label for="bairro_pf">Bairro *</label>
                        <input type="text" name="bairro_pf" class="form-control"><br>

                        <label for="cep_pf">CEP *</label>
                        <input type="text" name="cep_pf" id="mask_cep" class="form-control"><br>

                        <label for="logradouro_pj">Rua *</label>
                        <input type="text" name="logradouro_pf" class="form-control"><br>

                        <label for="numero_pf">Número *</label>
                        <input type="text" name="numero_pf" class="form-control"><br>

                        <label for="complemento_pf">Complemento</label>
                        <input type="text" name="complemento_pf" placeholder="Opcional" class="form-control"><br>
                    </div>
              
                    <!-- Campos específicos para Pessoa Jurídica -->
                    <div id="pessoa_juridica_fields" style="display: none; width: 25vw; margin-left:0.8%;" class="row">
                        <label for="nome_fantasia_pj">Nome Fantasia</label>
                        <input type="text" name="nome_fantasia_pj" class="form-control"><br>

                        <label for="razao_social_pj">Razão Social</label>
                        <input type="text" name="razao_social_pj" class="form-control"><br>

                        <label for="cnpj_pj">CNPJ *</label>
                        <input type="text" name="cnpj_pj" maxlength="14" id="mask_cnpj_pj" class="form-control"><br>

                        <label for="abertura_pj">Data de Abertura</label>
                        <input type="text" name="abertura_pj" id="mask_abertura_pj" class="form-control"><br>

                        <label for="funcionario_comprador_pj">Funcionário Comprador *</label>
                        <input type="text" name="funcionario_comprador_pj" class="form-control"><br>

                        <label for="telefone_pj">Telefone *</label>
                        <div style="display: inline-flex">
                        <input type="text" name="telefone_pj_ddd" placeholder="DDD" maxlength="3" class="form-control" style="width:5vw;">
                        <input type="text" name="telefone_pj_numero" placeholder="Número" maxlength="11"
                            id="mask_telefone_pj" class="form-control" style="width:20vw;"><br>
                        </div>
                            <br>
                        <label for="estado_pj">Estado *</label>
                        <select name="estado_pj" class="form-control">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select><br>

                        <label for="cidade_pj">Cidade * </label>
                        <input type="text" name="cidade_pj" class="form-control"><br>

                        <label for="bairro_pj">Bairro *</label>
                        <input type="text" name="bairro_pj" class="form-control"><br>

                        <label for="cep_pj">CEP *</label>
                        <input type="text" name="cep_pj" id="mask_cep_pj" class="form-control"><br>

                        <label for="logradouro_pj">Rua *</label>
                        <input type="text" name="logradouro_pj" class="form-control"><br>

                        <label for="numero_pj">Número *</label>
                        <input type="text" name="numero_pj" class="form-control"><br>

                        <label for="complemento_pj">Complemento</label>
                        <input type="text" name="complemento_pj" placeholder="Opcional" class="form-control"><br>
                    </div>

                    <!-- Campos de email e senha -->
                    <div id="email_senha_fields" style="display: none; width: 25vw;">
                        <label for="email">Email </label>
                        <input type="email" name="email" placeholder="@gmail.com" required class="form-control">
                        <div id="email-erro" class="erro" style="display: none;">Email inválido.</div><br>

                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" required class="form-control" placeholder="A senha deve 
                                                                                       ter no mínimo 8 caracteres."><br>

                        <label for="confirmar_senha">Confirmar Senha</label>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" required
                            class="form-control"><br>
                        <div id="senha-erro" class="erro" style="display: none;">Confirmação de senha incorreta.</div>
                    </div>

                    <div id="politicas" style="display: none; text-align: center;">
                        <input type="checkbox" id="politicas_privacidade" name="politicas_privacidade" required/>
                        <label for="politicas_privacidade">
                            Li e estou de acordo com as <a href="politicas_privacidade.php">políticas privacidade.*</a>
                        </label>

                        <div id="marcar_checkbox" class="erro" style="display: none;">É necessário estar de acordo com as 
                                                                                      políticas privacidade.</div>
                    </div>

                    <input class="btn btn-lg botao-cads " type="submit" value="Cadastrar-se" id="cadastrar"
                        style="display: none; text-align: center;"><br>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Função para mostrar/ocultar campos com base no tipo de pessoa selecionado
        function showFields(id) {
            // Oculta todos os campos
            document.getElementById('email_senha_fields').style.display = 'none';
            document.getElementById('pessoa_fisica_fields').style.display = 'none';
            document.getElementById('pessoa_juridica_fields').style.display = 'none';
            document.getElementById('politicas').style.display = 'block';

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
                // Adiciona cor vermelha à mensagem de erro
                senhaErro.style.color = "red";
                senhaErro.style.display = "block";

                // Adiciona um atraso de 3 segundos antes de esconder a mensagem de erro
                setTimeout(function () {
                    senhaErro.style.display = "none";
                }, 2000);

                return false;
            } else {
                senhaErro.style.display = "none";
                return true;
            }
        }
        function verificarCheckbox() {
            // Verifica se a checkbox está marcada
            var checkbox = document.getElementById("politicas_privacidade");
            var cadastrarBotao = document.getElementById('cadastrar');

            if (checkbox.checked) {
                // Se a checkbox está marcada, habilita o botão de cadastrar-se
                cadastrarBotao.disabled = false;
            } else {
                // Se a checkbox não está marcada, desabilita o botão de cadastrar-se
                cadastrarBotao.disabled = true;
            }
        }

        function verificarCheckbox() {
            var checkbox = document.getElementById("politicas_privacidade");
            var marcarCheckboxErro = document.getElementById('marcar_checkbox');

            if (checkbox.checked) {
                // Se a checkbox está marcada, oculta a mensagem de erro
                marcarCheckboxErro.style.display = "none";
            } else {
                // Se a checkbox não está marcada, exibe a mensagem de erro
                marcarCheckboxErro.style.color = "red";
                marcarCheckboxErro.style.display = "block";

                // Adiciona um atraso de 3 segundos antes de esconder a mensagem de erro
                setTimeout(function () {
                    marcarCheckboxErro.style.display = "none";
                }, 0);
            }
        }

    // ... (seu código existente)

    // Chama verificarCheckbox no carregamento inicial para garantir que o estado seja refletido corretamente
    verificarCheckbox();

    </script>

    </br></br></br></br></br></br>
    <?php include 'rodape.html' ?>

</body>
</html> 