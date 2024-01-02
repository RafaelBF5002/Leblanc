<?php
// Configuração do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Inicializa a sessão do carrinho
session_start();

// Adiciona um produto ao carrinho
if(isset($_GET['add'])) {
    $productId = $_GET['add'];
    $sql = "SELECT * FROM produtos WHERE id = $productId";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cartItem = array(
            "id" => $row["id"],
            "nome" => $row["descricao"],
            "preco" => $row["preco"],
            "imagem" => $row["imagem"],
        );

        // Adiciona o item ao carrinho
        $_SESSION['carrinho'][] = $cartItem;
    }
}

// Remove um produto do carrinho

if(isset($_GET['remove'])) {
    $removeId = $_GET['remove'];
    
    foreach ($_SESSION['carrinho'] as $index => $item) {
        if ($item['id'] == $removeId) {
            // Remove apenas o item com o ID correspondente
            unset($_SESSION['carrinho'][$index]);
            break; // Para sair do loop após remover o item
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>


    <title>Carrinho de Compras</title> 
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #5c1d13;
        }

        @font-face {
            font-family: Ananda ;
            src: url("../font/ananda_2/Ananda Black Personal Use.ttf");
        }

        header {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px 0;
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

        nav{
            background-color: #fff;
            margin: 0 25px 0 25px;
            padding: 10px 0;
        }

        .utilitarios{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .utilitarios ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .utilitarios ul li {
            margin-right: 10px;
        }

        .utilitarios ul li a {
            font-family: serif;
            color: #5b1f00;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .marcado{
            border-bottom: 1px solid #5b1f00;
        }

        .icon{
            margin: 0 10px 0 10px;
            cursor: pointer;
        }

        #carrinho{
            border-bottom: 2px solid #000; 
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

        /* main{
            display: flex;
            flex-direction: column;
            align-items: center;
        } */

        .container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex: 2;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 5% 5% 0 0
        }

        .cart h2 {
            margin: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        .cart ul {
            list-style: none;
            padding: 10px;
        }

        .cart-item {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .cart-item img {
            /* max-width: 50px; Ajuste o tamanho da miniatura aqui */
            margin-right: 15px;
        }

        .cart-item a {
            color: #e74c3c;
            text-decoration: none;
        }

        .checkout {
            display: flex;
            flex-wrap: wrap;
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 5% 5% 0 0;
        }

        .checkout h2 {
            margin: 0;
            margin-bottom: 10px;
            text-align: center;
        }

        .precoTotal {
            display: flex;
            align-items: center; 
        }

        .checkout form{
            justify-content: center ;
            align-items: flex-end;
        }

        .checkout input[type='text']{
            display: flex;
            font-size: 1rem;
            font-weight: bold;
            border: 0;
            pointer-events: none;
            
        }

        .btnCompra{
            flex-wrap: wrap;
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 30%;
            margin-bottom: 20px;
            justify-content: center;
        }

        .continuarCompra {
            width: 300px;
            display: flex;
            margin-left: 20px;
            margin-right: 20px;
            text-align: center;
            /* margin-top: 20px; */
        }

        .continuarCompra a{
            font-size: 1rem;
            width: 500px;
            text-decoration: none;
            border-radius: 3px;
            padding: 8px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-width: 2px;
            border-style: outset;
            border-color: #fff;
            border-image: initial;

        }

        button{
            border-radius: 3px;
            padding: 8px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

        .finalizar{
            width: 300px;
            border-radius: 3px;
            padding: 8px;
            background-color: #000;
            color: #fff;
            cursor: pointer;
        }

    </style>
</head>
<body>
<header>
<div class="logo">
        <a href="../sistema.php">
            <h1>
                Leblanc Café
            </h1>
        </a>
    </div>


    <div class="utilitarios">
        <ul> 
            <li> <a href="../sistema.php"> Home </a> </li>
            <li> <a href="todosprod.php"> Produtos </a> </li>
            <li> <a href="contao.php"> Contato </a> </li>
        </ul>
    </div>

    <div class="align-icon">
        <a class="icon" href="exibir.php"> <!-- Meus Pedidos -->
            <img src="../icones/images-removebg-preview.png" alt="meus pedidos" width="50px" height="50px"> 
        </a>
        <a class="icon" id="carrinho" href="c.php">   <!-- carrinho -->
            <img src="../icones/carrinho-removebg-preview.png" alt="carrinho de compras" width="60px" height="50px"> 
        </a>
        <form class="logout-form" action="../logout.php" method="post">
            <input class="log-out" type="image" src="../icones/iconLogout.png" alt="Logout">
        </form>
    </div>
</header>


<div class="container">
    
    <section class="cart">
        <h2>Seu Carrinho</h2>
        <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
            <ul>
                <?php 
                $total = 0;
                foreach($_SESSION['carrinho'] as $item): 
                    $total += $item['preco'];
                ?>
                    <li class="cart-item">
                        <?php if(isset($item['imagem']) && !empty($item['imagem'])): ?>
                            <img src="data:image/jpeg;base64,<?= base64_encode($item['imagem']) ?>" alt="<?= $item['nome'] ?>" width="80" height="80">
                        <?php endif; ?>
                        <?= $item['nome'] ?> - <?= $item['preco'] ?>

                        <form method="post" action="?remove=<?= $item['id'] ?>">
                            <button type="submit">Remover</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>O carrinho está vazio.</p>
        <?php endif; ?>
    </section>

    <section class="checkout">
        <h2>Resumo do Pedido</h2>
    
        <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
            <form method="post" action="selecionar.php">
                <div class="precoTotal">
                    
                    <p> Total <strong>R$:</strong> <p>
                    <input type="text" readonly name="total" value="<?= $total?>">
                </div>
                    <div class="btnCompra">
                        <button class="finalizar" type="submit">Finalizar Compra</button>
                    </div>
                    <div class="continuarCompra">
                        <a href="../sistema.php"> Continuar Comprando </a>
                    </div>
                </form>
        <?php else: ?>
            <p>O carrinho está vazio.</p>
        <?php endif; ?>
    </section>    
</div>
  
</body>
</html>
