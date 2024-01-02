<?php
session_start(); // Inicia a sessão
// $_SESSION['carrinho'][] = $cartItem;
// Verificar se o método de pagamento foi selecionado
if (!isset($_SESSION["metodo_pagamento"]) || $_SESSION["metodo_pagamento"] !== "debito") {
    // Redirecionar de volta para a página de seleção se o método de pagamento não estiver definido ou não for "Débito"
    header("Location: sua_pagina_de_selecao.php");
    exit();
}

// Lógica para processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Adicione aqui a lógica para processar os dados do formulário
    // Por exemplo, você pode validar os dados do cartão, salvar no banco de dados, etc.
    // Lembre-se de implementar medidas de segurança adequadas para manipulação de dados sensíveis.

    // Após o processamento bem-sucedido, você pode redirecionar para uma página de confirmação ou outra página desejada
    header("Location: sucesso.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página de Pagamento com Cartão de Débito</title>
</head>

<style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #5c1d13  ;
        }
     header {
            background-color: #fff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .logo h1 {
            font-size: 40px;
            margin-left: 25px;
            margin-bottom: 20px;
            color: #5b1f00;
            font-family: 'Ananda' , sans-serif;
            flex-wrap: nowrap;
        }

        .logo a{
            text-decoration: none;
        }
               
        .icon{
            margin: 0 10px 0 10px;
            cursor: pointer;
        }

        .align-icon{
            align-items: center;
            display: flex;
            justify-content: space-between;
        }

        .log-out{
            margin: 0 25px 0 10px;
            height: 50px;
            width: 50px;
        }

        
        nav{
            display: flex;
            align-items: center;
        }

        nav ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 10px;
        }

        ul li a {
            font-family: serif;
            color: #5b1f00;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .marcado{
            border-bottom: 1px solid #5b1f00;
        }

        h1{
            font-family: arial;
            color: #fff;

        }
        p{
            color: #fff;  
        }
        @font-face {
            font-family: Ananda ;
            src: url("../font/ananda_2/Ananda Black Personal Use.ttf");
        }

        main{
            display: flex;
            justify-content: center;
            /* flex-direction:; */
            border-radius: 3px;
            text-align: center;
        }

        form{
            padding: 20px;
            margin-top: 30px;
        }

        .formCard input[type=text], [type=date] {
            width: 250px;
            margin: 10px;
        }

        .cartao{
            border-radius: 5px;
            width: 300px;
            padding: 30px;
            background-color: #fff;
            margin: 25px; 
        }

        .cart{
            border-radius: 5px;
            width: 300px;
            padding: 30px;
            background-color: #fff;
            margin: 25px; 
        }

        .formCheck input[type=text]{
            text-align: center;
            border: none;
            font-size: 1.2rem;
        }

        .formCheck input[type=submit]{
            background-color: black;
            color: white;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .formCheck input[type=submit]:hover {
            background-color: #020202;
            color: #ccc;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 10px;
        }
        
        .total{
            color: black;
        }

        .continuarCompra a{
            color: black;
        }
        /* .checkout{
            align-items: center;
            border-radius: 5px;
            width: 300px;
            padding: 30px;
            background-color: #fff;
            margin: 25px; 
        } */
</style>
<body>

<header>

<div class="logo">
    <a href="sistema.php">
        <h1>
            Leblanc Café
        </h1>
    </a>
</div>

<nav>
    <ul> 
        <li> <a href="../sistema.php" class="marcado"> Home </a> </li>
        <li> <a href="todosprod.php"> Produtos </a> </li>
        <li> <a href="contao.php" > Contato </a> </li>
    </ul>
</nav>

<div class="align-icon">
    <a class="icon" href="exibir.php"> <!-- Meus Pedidos -->
        <img src="../icones/images-removebg-preview.png" alt="meus pedidos" width="50px" height="50px"> 
    </a>
    <a class="icon" href="c.php">   <!-- carrinho -->
        <img src="../icones/carrinho-removebg-preview.png" alt="carrinho de compras" width="60px" height="50px"> 
    </a>
    <form class="logout-form" action="logout.php" method="post">
        <input class="log-out" type="image" src="../icones/iconLogout.png" alt="Logout">
    </form>
</div>
</header>

<main>
    <div class="cartao">

            <h2>Pagamento com Cartão de Credito</h2>

        <form class="formCard" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="numero_cartao">Número do Cartão:</label>
            <input type="text" id="numero_cartao" name="numero_cartao" placeholder="Insira o número do cartão" required><br>

            <label for="nome_titular">Nome do Titular:</label>
            <input type="text" id="nome_titular" name="nome_titular" placeholder="Insira o Nome do Titular" required><br>

            <label for="data_validade">Data de Validade:</label> <br>
            <input type="date" id="data_validade" name="data_validade" placeholder="MM/AA" required><br>

            <label for="codigo_seguranca">Código de Segurança:</label>
            <input type="text" id="codigo_seguranca" name="codigo_seguranca" placeholder="Insira o código de 3 digitos do cartão"  required><br>

            <!-- <input type="submit" value="Finalizar Compra"> -->
        </form>
    </div>

    <section class="cart">
        <h2>Seu Carrinho</h2>
        <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
            <ul>
                <?php 
            $total = 0;
            foreach($_SESSION['carrinho'] as $key => $item): 
                // Certifique-se de que os itens tenham valores válidos antes de exibi-los
                if(isset($item['nome']) && isset($item['preco']) && is_numeric($item['preco'])):
                    $total += $item['preco'];
                    ?>
                    <li class="cart-item">
                        <?php if(isset($item['imagem']) && !empty($item['imagem'])): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['imagem']) ?>" alt="<?= $item['nome'] ?>" width="80" height="80">
                            <?php endif; ?>
                            <?= $item['nome'] ?> - <?= $item['preco'] ?>
                            <!-- <form method="post" action="?remove=<?= $key ?>">
                                <button type="submit">Remover</button>
                            </form> -->
                    </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                    <p>Total: <?= $total ?></p>
                    <?php else: ?>
                        <p>O carrinho está vazio.</p>
                        <?php endif; ?>
        <div class="checkout">
                <h2>Resumo do Pedido</h2>
                
                <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
                    <form class="formCheck" method="post" action="processar_checkout.php">
                        <div class="precoTotal">
                            
                        <strong><p class="total"> Total R$: <p></strong>
                                <input type="text" readonly name="total" value="<?= $total?>">
                            </div>
                            
                            <input type="submit" value="Finalizar Compra">

                            <div class="continuarCompra">
                                <a href="../sistema.php"> Continuar Comprando </a>
                            </div>
                    </form>
                        <?php else: ?>
                            <p>O carrinho está vazio.</p>
                            <?php endif; ?>
                        </div>
        </div>    
    </section>

                    
</main>


</body>
</html>
