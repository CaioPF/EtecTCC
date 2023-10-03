<nav class="navbar navbar-inverse"><!--Apague o inverse para estar alterando a cor do menu de navegação-->
  <div class="container-fluid"><!--Essa linha cria uma borda entre o menu e o texto-->
    
    <div class="navbar-header">
      <!------------------------------------------------------------------------------------------------------------------------>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>              <!--Esse é o botão hamburguer que aparece quando o site-->
        <span class="icon-bar"></span>                              <!-- nao está em tela cheia-->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!------------------------------------------------------------------------------------------------------------------------>
      <a class="navbar-brand" href="index.php">Protector Kings</a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          
          <!--Tudo que esta dentro do código a baixo se refere ao botão de busa por categoria-->
          <!---------------------------------------------------------------------------------------------------------------------->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" ria-expanded="false">Categoria <span class="caret"></span></a>

          <ul class="dropdown-menu">                  <!--Os itens Desing, Infra-estrutra, Dados e etc estão dentro de categorias-->
            <li><a href="categoria.php?cat=Câmeras">Câmera de segurança</a></li>
            <li><a href="categoria.php?cat=Controle de acesso">Controle de acesso</a></li>
            <li><a href="categoria.php?cat=Sensor de presença">Sensor de presença</a></li>
            <li><a href="#">Sistemas de gravação de áudio</a></li>
          </ul>
          <!---------------------------------------------------------------------------------------------------------------------->
        </li>
      </ul>
      <!----------------------------------------------------------------------------------------------------------------------->
      <form class="navbar-form navbar-left" role="search">  
        <div class="form-group">    
          <input type="text" class="form-control" placeholder="Buscar">                 <!--Barra de pesquisa-->
        </div>
        <button type="submit" class="btn btn-default">Pesquisar</button>
      </form>
      <!----------------------------------------------------------------------------------------------------------------------->
      <ul class="nav navbar-nav navbar-right">
      <li><a href="cadastrar_produto.php"><span> Cadastar produtos</a></li>
        <?php  include 'session_start.php';?>
        <li><a href="contato.php">Contato</a></li>
      </ul>
    </div>
  </div>
</nav>