<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produto</title>
    <link rel="stylesheet" href="login.css">
    
    <?php include 'links.php'; ?>

    <style>
    .center-content {
        text-align: center;
        margin: 0 auto;
        max-width: 50%; /* Define a largura máxima para evitar que o formulário fique muito largo */
    }
    .borda{
        border-width: 1.5%;
        border-style: solid;
        border-color:  black;
        height: 25%;
        width: 25%;
        margin-left: 38%;

    }
</style>
</head>

<body>
<?php  
include 'conexao.php';
?>

<!------------------------------------------------------------------------------------------------->
<!--Menu-->
<div class="nav" class= "borda">
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
        </ul>
        </div>
    </div>
    </nav>
</div>
<!------------------------------------------------------------------------------------------------->

<div class="borda">
<h1 class="center-content">Cadastro de Produto</h1> 
</br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="center-content">

        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao_produto" name="descricao_produto" required></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" id="preco_produto" name="preco_produto" step="0.01" required><br><br>

        <!--<label for="categoria">Categoria do produto</label>
        <input type="text" id="categoria_produto" name="categoria_produto" step="0.01" required><br><br>-->
        <label for="categoria">Categoria do produto</label>
        <select name="categoria_produto" id="categoria_produto">
            <option>Câmeras</option>
            <option>Controle de acesso</option>
            <option>#</option>
            <option>#</option>
        <select></br></br> 

        <label for="pasta">Qual pasta a imagem será armazenada </label>
        <input type="text" id="pasta_imagem" name="pasta_imagem" step="0.01" required><br><br>

        <label for="nome_imagem">Nome da imagem do produto</label>
        <input type="text" id="imagem_produto" name="imagem_produto" step="0.01" required><br><br>

        <label for="quantidade">Quantide em estoque</label>
        <input type="text" id="quantidade_produto" name="quantidade_produto" step="0.01" required><br><br>

        <input type="submit" value="Cadastrar"></br></br></br>
    </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtenha os dados do formulário
        $nome_produto = $_POST['nome_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $preco_produto = $_POST['preco_produto'];
        $categoria_produto = $_POST['categoria_produto'];
        $pasta_imagem = $_POST['pasta_imagem'];
        $imagem_produto = $_POST['imagem_produto'];
        $quantidade_produto = $_POST['quantidade_produto'];
    
        // Prepare e execute a consulta SQL para inserir os dados no banco de dados
        $sql = "INSERT INTO produto(nome_produto, descricao_produto, preco_produto, categoria_produto, 
                                    pasta_imagem, imagem_produto, quantidade_produto) 
                VALUES ('$nome_produto', '$descricao_produto', '$preco_produto', '$categoria_produto', 
                        '$pasta_imagem', '$imagem_produto', '$quantidade_produto')";
    
        if ($mysqli->query($sql) == TRUE) {
            echo "";
        } else {
            echo "Erro ao cadastrar o produto: " . $mysqli->error;
        }
    }
    
    // Fechar a conexão
    $mysqli->close();
    
include 'rodape.html'; 
?>
</body>
</html>