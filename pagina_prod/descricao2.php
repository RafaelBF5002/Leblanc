<?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    // Cria a conexão com o banco de dados  
    $conn = new mysqli($servername, $username, $password, $dbname);
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
            "imagem" =>   base64_encode($row['imagem']),
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
<div class="back-link">
        <a href="../sistema.php">Voltar à Página Inicial</a>
    </div>
    <div class="container">
        <div class="cart">
            <!-- ... (código HTML existente) ... -->

        <div class="cart">
        
           
            <?php if(isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0): ?>
                <ul>
                    <?php 
                    $total = 0;
                    foreach($_SESSION['carrinho'] as $item): 
                        $total += $item['preco'];
                        
                    ?>
                        <li class="cart-item">
                            <?= $item['nome'] ?> - <?= $item['preco'] ?>  

                            
<!--                             
                            <form method="post" action="?remove=<?= $item['id'] ?>">
                                <button type="submit">Remover</button>
                            </form> -->
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
        <title>Descrição do Produto</title>
   



<?php

if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];

    // Conexão com o banco de dados
    $conexao = new mysqli("localhost", "root", "", "formulario");

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    // Consulta para obter os detalhes do produto
    $consulta = "SELECT descricao, preco, imagem, descricao2 FROM produtos WHERE id = $produto_id";
    $result = $conexao->query($consulta);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagem = $row["imagem"];
        $descricao = $row["descricao"];
        $descricao2 = $row["descricao2"];
        $preco = $row["preco"];
    } else {
        echo "Produto não encontrado.";
        exit();
    }

    // Fechar a conexão com o banco de dados
   
?>

<!DOCTYPE html>
<html>
<head>
<?php
                $sql = "SELECT * FROM produtos WHERE id = $produto_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<p>{$row['descricao']}    <br>      R$:  {$row['preco']}   <br>   {$row['categoria']} <br>Peso: {$row['descricao2']} </p>";
                        echo '<form method="post" action="?add=' . $row['id'] . '">';
                        // echo '<button type="submit">Adicionar ao Carrinho</button>';
                        echo '</form>';
                        echo '</div></div>';
                    }
                } else {
                    echo "<p>Nenhum produto disponível.</p>";
                }
                

                
                ?>
    
</head>
<body>

</body>
</html>
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
            padding: 10px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            padding: 0;
        }

        .search-bar {
            text-align: center;
            margin: 20px 0;
        }

        .search-bar input[type="text"] {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .search-bar button:hover {
            background-color: #555;
        }

        .back-link {
            text-align: center;
            margin: 20px 0;
        }

        .back-link a {
            text-decoration: none;
            color: #333;
        }

        .container {
            width: 75%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .product {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            display: inline-block;
            width: 14%; /* Ajustado para exibir 4 produtos por linha */
            background-color: #fff;
            overflow: hidden; /* Limitar o conteúdo dentro do container */
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product h2 {
            font-size: 20px;
            margin-top: 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis; /* Adicionar "..." para descrições longas */
        }

        .product p {
            font-size: 16px;
            overflow: hidden;
            max-height: 100px; /* Limitar a altura do parágrafo */
        }

        .add-to-cart-button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .add-to-cart-button:hover {
            background-color: #555;
        }
    </style>
    <?php
    
    $conexao->close();
} else {
    
    exit();
}
