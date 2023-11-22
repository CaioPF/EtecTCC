<!--Esse arquivo faz como que o usuario possa fazer login, ao fazer o login com sucesso o botao de login irá sumir e dar espaço ao botão de sair-->

<?php
session_start();
include 'conexao.php';


if (empty($_SESSION['ID'])) { ?> <!--o "empty" verifica se estavazio, se estiver ele ira mostrar "Cadastro" e "Login" -->
    <!-- Tudo que está aqui dentro irá desaparecer quando o login for efetuado com sucesso -->
    <Li><a href="carrinho.php" ><span class="glyphicon glyphicon-shopping-cart"></"> carrinho</span></a></Li>
    <li><a href="cadastro.php"><span> Cadastro</span></a></li>
    <li><a href="login.php"><span> Login</span></a></li>
<?php   
} 
else {
    if ($_SESSION['Status'] == 'Cliente') {
        if (isset($_SESSION['ID']) && !is_null($_SESSION['ID'])) {
            $consulta_usuario = $mysqli->query("SELECT loginn.id_login, pessoa_fisica.nome_pf
            FROM loginn
            INNER JOIN pessoa_fisica ON loginn.id_login = pessoa_fisica.id_login
            WHERE loginn.id_login = '$_SESSION[ID]'");
            $exibe_usuario = $consulta_usuario->fetch_assoc();

            if ($exibe_usuario !== null && isset($exibe_usuario['nome_pf'])) {
                ?>
                <Li><a href="carrinho.php" ><span class="glyphicon glyphicon-shopping-cart"></"> carrinho</span></a></Li>
                <li>
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" ria-expanded="false">
                        <?php echo $exibe_usuario['nome_pf']; ?><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">  
                        <li><a href="perfil_usuario.php"><span> Histórico de compras</span></a></li>                     
                        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</span></a></li>
                    </ul>
                </li>
                <?php
            } 
        }
    }
    elseif ($_SESSION['Status'] == 'ADM') {
        // Consulta para obter informações do administrador
        $consulta_adm = $mysqli->query("SELECT loginn.id_login, funcionario.nome_func
                                       FROM loginn
                                       INNER JOIN funcionario on loginn.id_login = funcionario.id_login
                                       WHERE loginn.id_login = '$_SESSION[ID]'");
        $exibe_usuario_adm =  $consulta_adm->fetch_assoc();
        ?>
        <li><a data-toggle="dropdown" role="button" aria-haspopup="true" ria-expanded="false">Lista de perfil <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="listaUsuarios.php"><span>Usuários</span></a></li>
         <li><a href="listaFuncionario.php"><span>Funcionários</span></a></li>
        <li><a href="listaClientePf.php"><span>Clientes PF</span></a></li>
        <li><a href="listaClientePj.php"><span>Clientes PJ</span></a></li>
        
        </ul>

        <li><a data-toggle="dropdown" role="button" aria-haspopup="true" ria-expanded="false">Produtos <span class="caret"></span></a>
        <ul class="dropdown-menu">
           
            <li><a href="adm_cadastrar_produto.php"><span>Cadastar produtos</span></a></li>
            <li><a href="adm_alterar_produto.php"><span> Altera produto</span></a></li>
            <li><a href="adm_apagar_produto.php"><span> Apagar produto</span></a></li>
        </ul>
    </li>
    
    <li>
        <a href="adm.php" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" ria-expanded="false">
            <?php echo $exibe_usuario_adm['nome_func']; ?><span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <button  class="btn btn-block  btn-danger" >Administrador</button>
            <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</span></a></li>
        </ul>
    </li> 
    <?php
    }
    // Lidar com outros estados de sessão, se necessário
}
?>