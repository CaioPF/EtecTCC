<!--Esse arquivo faz como que o usuario possa fazer login, ao fazer o login com sucesso o botao de login irá sumir e dar espaço ao botão de sair-->

<?php
session_start();

if (empty($_SESSION['ID'])) { ?>
<!--tudo que esta aqui dentro irá desaparecer quando o login for efetuado com sucesso-->
    <li><a href="cadastro.php"><span> Cadastro</span></a></li>
    <li><a href="login.php"><span> Login</span></a></li>
    
<?php   
} 
else {
    if (isset($_SESSION['ID']) && !is_null($_SESSION['ID'])) {
        $consulta_usuario = $mysqli->query("SELECT loginn.id_login, pessoa_fisica.nome_pf
        FROM loginn
        INNER JOIN pessoa_fisica ON loginn.id_login = pessoa_fisica.id_login
        WHERE loginn.id_login = '$_SESSION[ID]'");
        $exibe_usuario =  $consulta_usuario->fetch_assoc();

        if ($exibe_usuario !== null && isset($exibe_usuario['nome_pf'])) {
            ?>
            <li >
                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" ria-expanded="false">
                    <?php echo $exibe_usuario['nome_pf']; ?></span><span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                    
                        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"> Sair</span></a></li>
                    </ul>
            </li>

            <?php
        } 
        else {
            //redirecionar o usuário ou exibir uma mensagem de erro.
        }
    } 
    else {
        // Lidar com o caso em que $_SESSION['ID'] não está definido ou é nulo
    }
}
        ?>