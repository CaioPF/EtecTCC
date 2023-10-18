<div class="container-fluid">
    <div class="row text-center" style="margin-top: 15px;">
        <h1>Carrinho de Compras</h1>
    </div>
    
    <?php
    $total = null; // A variável total começa vazia

    foreach ($_SESSION['carrinho'] as $id_produto => $quantidade_produto) {
        $consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto ='$id_produto'");
        $exibe =  $consulta->fetch_assoc();

        $nome_produto = $exibe['nome_produto'];
        $preco_produto = number_format(($exibe['preco_produto']), 2, ',', '.');
        $subtotal = $exibe['preco_produto'] * $quantidade_produto; // Subtotal do item

        $total += $subtotal; // Adicione o subtotal ao total
    ?>
    
    <div class="row" style="margin-top: 15px;">
        <div class="col-sm-1 col-sm-offset-1">
            <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>" class="img-responsive imgm">
        </div>
        
        <div class="col-sm-4">
            <h4 style="padding-top: 20px"><?php echo $nome_produto; ?></h4>
        </div>
        
        <div class="col-sm-2">
            <h4 style="padding-top: 20px">R$ <?php echo $preco_produto; ?></h4>
        </div>
        
        <div class="col-sm-2" style="padding-top: 20px">
			<!-- Exibe a quantidade atual e botões de adição e subtração -->
			<h4>
				<a href="#" onclick="updateQuantity(<?php echo $id_produto; ?>, 'subtract'); return false;">
					<button class="btn btn-sm btn-primary">-</button>
				</a>
				<span id="quantityDisplay<?php echo $id_produto; ?>"><?php echo $quantidade_produto; ?></span>
				<a href="#" onclick="updateQuantity(<?php echo $id_produto; ?>, 'add'); return false;">
					<button class="btn btn-sm btn-primary">+</button>
				</a>
			</h4>
		</div>


        
        <div class="col-sm-1 col-xs-offset-right-1" style="padding-top: 20px">
            <!-- Apaga o item do carrinho -->
            <a href="apagacarrinho.php?id_produto=<?php echo $id_produto; ?>">
                <button class="btn btn-lg btn-block btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </a>
        </div>
        
    </div>
    
    <?php } ?>
</div>

<script>
function updateQuantity(id_produto, action) {
    // Obtenha o elemento de exibição da quantidade
    var quantityDisplay = document.getElementById('quantityDisplay' + id_produto);

    // Obtenha a quantidade atual do elemento de exibição
    var currentQuantity = parseInt(quantityDisplay.innerHTML);

    // Atualize a quantidade com base na ação
    if (action === 'add') {
        currentQuantity++;
    } else if (action === 'subtract' && currentQuantity > 0) {
        currentQuantity--;
    }

    // Atualize o elemento de exibição com a nova quantidade
    quantityDisplay.innerHTML = currentQuantity;

    // Agora, você pode atualizar o carrinho no servidor (você precisa implementar essa lógica)
    // Certifique-se de enviar o id_produto e a nova quantidade para o servidor.

    // Exemplo de como você pode usar AJAX para atualizar o carrinho no servidor:
    // var xhr = new XMLHttpRequest();
    // xhr.open('POST', 'atualizarcarrinho.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.send('id_produto=' + id_produto + '&quantidade=' + currentQuantity);

    // Atualize os botões de adição e subtração, se necessário
    if (currentQuantity === 0) {
        // Desative o botão de subtração quando a quantidade é 0
        // Você pode adicionar mais lógica aqui conforme necessário
    }
}
</script>