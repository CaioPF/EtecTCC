<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <!-- Adicione seus estilos e scripts aqui, se necessário -->

    <style>
        .prod-selec {
            background-color: white;
            border: 2px;
            border-style: ridge;
            margin-top: 2%;
            width: 100%;
            display: inline-block;
            min-height: 10vw;

        }
        .au-quant
        {
            border-color: #daa520;
            background-color: #ffffff;
            color: #daa520;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row text-center" style="margin-top: 15px;">
            <h1>Carrinho de Compras</h1>
        </div>
        <div class="prod-selec">
            <?php
            $total = 0; // Inicialize o total como 0
            
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = array();
            }
            foreach ($_SESSION['carrinho'] as $id_produto => $quantidade_produto) {
                $consulta = $mysqli->query("SELECT * FROM produto WHERE id_produto = '$id_produto'");
                $exibe = $consulta->fetch_assoc();

                $nome_produto = $exibe['nome_produto'];
                $preco_produto = number_format($exibe['preco_produto'], 2, ',', '.');
                $subtotal = $exibe['preco_produto'] * $quantidade_produto; // Subtotal do item
            
                $total += $subtotal; // Adicione o subtotal ao total
                ?>

                <div class="row" style="margin-top: 15px;">
                    <div class="col-sm-1 col-sm-offset-1">
                        <img src="foto_produto/<?php echo $exibe['pasta_imagem']; ?>/<?php echo trim($exibe['imagem_produto']); ?>"
                            class="img-responsive imgm" style="width: 100%;">
                    </div>

                    <div class="col-sm-4">
                        <h4 style="padding-top: 20px">
                            <?php echo $nome_produto; ?>
                        </h4>
                    </div>

                    <div class="col-sm-2">
                        <h4 style="padding-top: 20px">R$
                            <?php echo $preco_produto; ?>
                        </h4>
                    </div>

                    <div class="col-sm-2" style="padding-top: 20px">
                        <!-- Exibe a quantidade atual e botões de adição e subtração -->
                        <h4>
                            <a href="#" onclick="updateQuantity(<?php echo $id_produto; ?>, 'subtract'); return false;">
                                <button class="btn btn-sm au-quant">-</button>
                            </a>
                            <span id="quantityDisplay<?php echo $id_produto; ?>">
                                <?php echo $quantidade_produto; ?>
                            </span>
                            <a href="#" onclick="updateQuantity(<?php echo $id_produto; ?>, 'add'); return false;">
                                <button class="btn btn-sm au-quant" onclick="atualizarCarrinho()">+</button>
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
                <br>
            <?php } ?>
        </div>

        <div class="row text-center" style="margin-top: 15px;">
            <h1>Total: R$ <span id="totalAmount">
                    <?php echo number_format($total, 2, ',', '.'); ?>
                </span></h1>
        </div>
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

            // Atualize o valor total
            var preco_produto = parseFloat('<?php echo $exibe['preco_produto']; ?>');
            var subtotal = currentQuantity * preco_produto;
            document.getElementById('totalAmount').textContent = subtotal.toFixed(2);

            // Agora, você pode atualizar o carrinho no servidor (você precisa implementar essa lógica).
        }

        function atualizarCarrinho() {
            // Você pode redirecionar para a mesma página para atualizar o carrinho
            window.location.reload();
        }
    </script>

</body>

</html>