<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect King</title>
    <link rel="stylesheet" href="login.css">

    <?php include 'links.php'; ?>
    <style>
        .bloco1
        {
        height:100%;
        width:100%;
        position: relative ;
        display: flex;
        flex-direction: column;
        -webkit-box-align: center;
        align-items: center;
        background-color: rgb(255, 255, 255) ;
        color: rgb(0, 0, 0); /*troca a cor da letra */
        border-radius: 2%;
        border-style: ridge;
        }
        .logo1
        {
            height:25rem;
            width:25rem;
            
        }
        .blocofora
        {
            
            margin-left:1%;
            margin-right:1%;
        }
        button
        {
           background-color: #daa520;
           border-color:#daa520;
        }
        h3
        {
            font-weight: bold
        }
            .esps{
            width: 100%;
            height: 2vw;
            
        }
        

    </style>
    
</head>

<body>
<?php  
include 'conexao.php';
?>

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
        <a class="navbar-brand" href="index.php">Protect King</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <?php  include 'session_start.php';?>
            
        </ul>
        </div>
    </div>
    </nav>
</div>
<!------------------------------------------------------------------------------------------------->

<div class="blocofora">
<div class="jumbotron">
<div class="container">
  <h1 class="display-4">Ola, Bem vindo!</h1>
  <p style="font-weight: bold; text-align: center;">Quem somos?</p>
  </div>
  <hr class="my-4">
  <div class="container">
  <p>Na Protect King, somos apaixonados por tornar as residências mais seguras e inteligentes. Fundada com a missão de proporcionar tranquilidade e comodidade para nossos clientes, somos especialistas em produtos de automação residencial voltados para a segurança.
 </p>
 </div>

</div>
</div>

 <div class ="container ">
    <div class ="row">
        <div class ="col-md-4">
            <h3>Nossa HIstoria</h3>
            <p>Criada em 2022, a Protect King surgiu da colaboração de sete jovens recém-formados, com a missão de aprimorar a segurança e o conforto nas residências dos nossos clientes. Ao longo dos anos, nossa empresa tem crescido e se destacado no setor, mantendo um firme compromisso com a inovação e uma atenção especial ao atendimento personalizado aos nossos clientes.</p>

            <button class="btn btn-block "  >
            <span class="glyphicon"></span>
            </button>
        </div>

        


        <div class ="col-md-4">
            <h3>Nossa abordagem</h3>
            <p>Entendemos que cada lar é único, e é por esse motivo que adotamos uma abordagem personalizada para atender as necessidades de segurança de nossos clientes. Com uma equipe altamente qualificada e experiente, estamos prontos para oferecer uma consultoria especializada que considera as particularidades de cada residência. Nosso objetivo é criar soluções sob medida que proporcionem a máxima proteção e tranquilidade para você e sua família.
z</p>

            <button class="btn btn-block "  >
            <span class="glyphicon"></span>
            </button>
        </div>

    

 

        <div class ="col-md-4">
            <h3>Por que escolher a Protect King?</h3>
            <p>Na Protect King nossa maior preocupação é a sua satisfação, por isso, entregamos praticidade, melhor custo e atendimento sob medida.</p>

            <button class="btn btn-block "  >
            <span class="glyphicon"></span>
            </button>
        </div>
        <div class="esps">

        </div>
    </div>
</div>

<?php include 'rodape.html' ?>
</body>
</html>
