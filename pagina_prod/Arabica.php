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
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .cart {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart h2 {
            margin-bottom: 10px;
        }

        .cart ul {
            list-style: none;
            padding: 0;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            padding: 5px 0;
        }

        .cart-item a {
            color: #e74c3c;
            text-decoration: none;
        }

        .products {
            flex: 2;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .products h2 {
            margin-bottom: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .product img {
            max-width: 100px;
            margin-right: 15px;
        }

        .product-details {
            flex: 1;
        }

        .product-details p {
            margin: 0;
        }

        .product-details button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
        }

        .product-details button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <header>
        <h1>Cafés Arabicas</h1>
        
    </header>
    <nav>
        <a href="../sistema.php">Voltar à Página Inicial</a>
    </nav>
    <div class="container">
        <div class="cart">
            <!-- ... (código HTML existente) ... -->

        <div class="cart">
            <h2>Seu Carrinho</h2>
            <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
                <ul>
                    <?php 
                    $total = 0;
                    foreach($_SESSION['carrinho'] as $item): 
                        $total += $item['preco'];
                    ?>
                        <li class="cart-item">
                            <?= $item['nome'] ?> - <?= $item['preco'] ?>
                            <form method="post" action="?remove=<?= $item['id'] ?>">
                                <button type="submit">Remover</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                    <li><strong>Total: R$ <?= $total ?></strong></li>
                </ul>

                <!-- Formulário de checkout -->
                <form method="post" action="processar_checkout.php">
                    <input type="hidden" name="total" value="<?= $total ?>">
                    <button type="submit">Finalizar Compra</button>
                    
                    
                </form>

            <?php else: ?>
                <p>O carrinho está vazio.</p>
            <?php endif; ?>
        </div>

<!-- ... (código HTML existente) ... -->

            
        </div>
        <div class="products">
            <h2>Produtos Disponíveis</h2>
            <ul>
                <?php
                $sql = "SELECT * FROM produtos WHERE categoria='Arabica'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<p>{$row['descricao']} - {$row['preco']} - {$row['categoria']}</p>";
                        echo '<form method="post" action="?add=' . $row['id'] . '">';
                        echo '<button type="submit">Adicionar ao Carrinho</button>';
                        echo '</form>';
                        echo '</div></div>';
                    }
                } else {
                    echo "<p>Nenhum produto disponível.</p>";
                }
                
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
