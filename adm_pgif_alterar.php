<?php
include 'conexao.php';

$id_produto_altera = $_GET['id_altera'];  // variavel recebe o id do prdouto que selecionamos

// abaixo criando a consulta pelo codigo do produto que recebemos acima
$consulta = $mysqli->query("SELECT imagem_produto FROM produto WHERE id_produto ='$id_produto_altera'"); 

//criando uma array 
$exibe = $consulta->fetch_assoc();


// todas as laterações feitas nos campos serão salvas nas variaveis abaixo
$nome_produto = $_POST['altera_nome_produto'];
$categoria_produto = $_POST['altera_categotia'];
$descricao_produto = $_POST['altera_descricao'];
$preco_produto = $_POST['altera_preco'];
$quantidade_produto = $_POST['altera_quantidade'];
$imagem_produto = $_POST['altera_nome_imagem'];


$remover1='.';  // variável que vai receber o ponto
$preco_produto = str_replace($remover1, '', $preco_produto); // substituindo . por vazio
$remover2=','; // variável que vai receber a virgula
$preco_produto = str_replace($remover2, '.', $preco_produto); // substituindo , por .

try {
	// comando update para realizar as altereções
	$alterar = $mysqli->query("UPDATE produto 
                            SET  
                            nome_produto = '$nome_produto',
                            categoria_produto = '$categoria_produto',
                            descricao_produto = '$descricao_produto',
                            preco_produto = '$preco_produto',
                            quantidade_produto = '$quantidade_produto',
                            imagem_produto = '$imagem_produto'

	                        WHERE id_produto = '$id_produto_altera' "); // as alterações serão feitas baseadas pelo codigo que recebe

	header('location:adm_alterar_produto.php'); 
} 
catch(PDOException $e) {  // se ocorrer algum erro, será gerado uma mensagem de erro	
	echo $e->getMessage();  	
}
?>