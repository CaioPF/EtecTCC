<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect King</title>
    <link rel="stylesheet" href="login.css">

    <?php  
    include 'conexao.php';
    include 'adm_menu.php';
    ?>
     
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
    </style>

    <script src="jquery.mask.js"></script>

    <script>
    $(document).ready(function(){
        $("#mask_precop").mask("000.000.000.000.000,00");
        
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

<div class="aviso"><p>AVISO!!!!</p>
    <p>É recomendado que o nome do "Nome da imagem do produto" sejá o mesmo do "Nome do Produto"
    com a extensão ".jpg"</p>
    <p>ex: camera 4k.jpg</p>
</div>


<div class="borda">
<h1 class="center-content">Cadastro de Produto</h1> 
</br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="center-content" enctype="multipart/form-data">

        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao_produto" name="descricao_produto" required></textarea><br><br>

        <label for="preco">Preço:</label>
        <input type="text" id="preco_produto" name="preco_produto"  step="0.01" id="mask_precop" required><br><br>

        <!--o nome da categoria tem que ser exatamente igual ao que esta no banco de dados na "categoria_produto"
            da tabela produto-->
        <label for="categoria">Categoria do produto</label>
        <select name="categoria_produto" id="categoria_produto" required>
            <option></option>
            <option value="Câmeras">Câmeras</option>
            <option value="Controle de acesso">Controle de acesso</option>
            <option value="Sensor de presença">Sensor de presença</option>
            <option>#</option>
        <select></br></br> 

        <label for="pasta">Pasta que a imagem será armazenada </label>
        <select name="pasta_imagem" id="pasta_imagem" required>
            <option></option>
            <option value="camera">camera</option>
            <option value="controle de acesso">controle de acesso</option>
            <option value="sensor de presença">sensor de presença</option>
        <select><br><br>

        <!--botao para subir a imagem direto pra pasta-->
        <!-- <input type="file" accept="image/*" class="form-control" name="botao_up_foto" required><br> -->

        <label for="nome_imagem">Nome da imagem do produto</label>
        <input type="text" id="imagem_produto" name="imagem_produto" step="0.01" required><br><br>

        <label for="quantidade">Quantide em estoque</label>
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



        // if(isset($_POST['Cadastrar'])){
        //     $arquivo = $_FILES['botao_up_foto'];
        
        //     $arquivonovo = explode('.', $arquivo['name']);
        
        //     if($arquivonovo[sizeof($arquivonovo)-1] != 'jpg'){
        //         die("nao vai dar pra enviar");
        //     }
        //     else{
        //         echo "boa garoto, deu certo";
        //         move_uploaded_file($arquivo['tmp_name'], $arquivo['name']);
        //     }
        // }


 
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