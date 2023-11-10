<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Protect King</title>
<link rel="stylesheet" href="login.css">

    <?php  
    include 'conexao.php';
    include 'links.php';
    include 'menu.php';
    ?>
     
    <!--CSS-->
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

        .aviso{
            border-width: 1.5%;
            border-style: solid;
            border-color: black;
            width: 25%;
            padding: 10px; /* Adicione algum espaço interno para o conteúdo do aviso */
            position: absolute;
            top: 90%; /* Ajuste conforme necessário para definir a distância do topo */
            right: 10%; /* Ajuste conforme necessário para definir a distância da direita */
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Estilos do botão para fechar o modal */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .error {
            background-color: #ff0000; /* Cor de fundo vermelha para mensagens de erro */
        }
    </style>

    <!----------------------------------------------------------------------------------->
    <!--js-->
    <script src="jquery.mask.js"></script>

    <script>
    //Sucesso
    function openSuccessModal() {
        var modal = document.getElementById('success-modal');
        modal.style.display = 'block';

        setTimeout(function() {
        modal.style.display = 'none';
        }, 1000); // Fecha o modal após 1 segundo (1000 milissegundos)
    }
    //-------------------------------------------------------------------------------
    // Erro 
    function openErrorModal(errorMessage) {
        var modal = document.getElementById('error-modal');
        var errorMessageElement = document.getElementById('error-message');
        errorMessageElement.innerHTML = errorMessage;
        modal.style.display = 'block';

        setTimeout(function() {
        modal.style.display = 'none';
        }, 1000); // Fecha o modal após 1 segundo (1000 milissegundos)
    }

    function closeErrorModal() {
        document.getElementById('error-modal').style.display = 'none';
    }

    //-------------------------------------------------------------------------------
    //Script da mascara 
    $(document).ready(function(){
        $("#preco_produto").mask("000.000.000.000.000,00");
        
        });
    </script>
</head>


<body>
<?php
//se o usuário tentar acessar um dos arquivos pela URL ou sem estar logado como ADM, ele será redirecionado para a index
if (empty($_SESSION['Status']) || $_SESSION['Status'] != 'ADM'){
    header('location: index.php');
} 
?>

<!-- Mensagem de aviso que o cadastro foi bem sucessedido -->
<div id="success-modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeSuccessModal()">&times;</span>
    <p>Produto cadastrado com sucesso!</p>
  </div>
</div>

<!--Mensagem de erro-->
<div id="error-modal" class="modal">
  <div class="modal-content error">
    <span class="close" onclick="closeErrorModal()">&times;</span>
    <p id="error-message">Erro ao cadastrar o produto</p>
  </div>
</div>

<div class="aviso"><p>AVISO!!!!</p>
    <p>É recomendado que o nome do "Nome da imagem do produto" sejá o mesmo do "Nome do Produto"
    com a extensão ".jpg"</p>
    <p>ex: camera 4k.jpg</p>
</div>

<div class="borda">
<h1 class="center-content">Cadastro de produtos</h1> 
</br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="center-content" enctype="multipart/form-data">

        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao_produto" name="descricao_produto" required></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" id="preco_produto" name="preco_produto"  step="0.01" id="preco_produto" required><br><br>

        <label for="categoria">Categoria do produto</label>
        <select name="categoria_produto" id="categoria_produto" required>
            <?php  include 'adm_categoria.php'; ?>
        <select></br></br> 

        <label for="pasta">Pasta que a imagem será armazenada </label>
        <select name="pasta_imagem" id="pasta_imagem" required>
            <option></option>
            <option value="camera">camera</option>
            <option value="controle de acesso">controle de acesso</option>
            <option value="sensor de presença">sensor de presença</option>
        <select><br><br>

        <!-- botao para subir a imagem direto pra pasta-->
        <!-- <input type="file" accept="image/*" class="form-control" name="botao_up_foto" required><br> -->

        <label for="nome_imagem">Nome da imagem do produto</label>
        <input type="text" id="imagem_produto" name="imagem_produto" step="0.01" placeholder="  ex: camera 4k.jpg" 
            equired><br><br>

        <label for="quantidade">Quantidade em estoque</label>
        <input type="text" id="quantidade_produto" name="quantidade_produto" step="0.01" required><br><br>

        <input type="submit" value="Cadastrar"></br></br></br>
    </form>
    </div>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //tudo que esta com "$" é variavel que vai ser usada pra armazenar no banco de dados
        $nome_produto = $_POST['nome_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $preco_produto = $_POST['preco_produto'];
        $categoria_produto = $_POST['categoria_produto'];
        $pasta_imagem = $_POST['pasta_imagem'];
        $imagem_produto = $_POST['imagem_produto'];
        $quantidade_produto = $_POST['quantidade_produto'];

        $remover1 = '.'; // variável que vai receber o ponto
        $preco_produto = str_replace($remover1, '', $preco_produto); // substituindo . por vazio
        $remover2 = ','; // Substitua vírgulas por pontos no preço
        $preco_produto = str_replace($remover2, '.', $preco_produto); // substituindo , por .

        $sql = "INSERT INTO produto(nome_produto, descricao_produto, preco_produto, categoria_produto, 
                                    pasta_imagem, imagem_produto, quantidade_produto) 
                VALUES ('$nome_produto', '$descricao_produto', '$preco_produto', '$categoria_produto', 
                        '$pasta_imagem', '$imagem_produto', '$quantidade_produto')";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Seu código existente para processar o formulário...
        
            if ($mysqli->query($sql) == TRUE) {
                echo "<script>openSuccessModal();</script>";
            } else {
                echo "<script>openErrorModal('Erro ao cadastrar o produto: " . $mysqli->error . "');</script>";
            }
        }
    }
    // Fechar a conexão
    $mysqli->close();
    
include 'rodape.html'; 
?>
</body>
</html>