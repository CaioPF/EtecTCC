<?php include 'links.php'; ?>
<!------------------------------------------------------------------------------------------------->
<!--Menu-->
<div class="nav" class= "borda">
    <nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
    <div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
        
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>              <!--Esse é o botão hamburguer que aparece 
                                                                            quando o site-->
            <span class="icon-bar"></span>                              <!-- nao está em tela cheia-->
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Protect King</a>
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
<!------------------------------------------------------------------------------------------------->