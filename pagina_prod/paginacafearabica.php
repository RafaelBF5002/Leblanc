<!DOCTYPE html>
<html>

<head>
    <title>Venda de Produtos Arábicos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E9DDCE;
        }

        header {
            background-color: #fff;
            color: #5b1f00;
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
</head>

<body>
<script>
        function searchProducts() {
            var input = document.getElementById('search-input');
            var filter = input.value.toLowerCase();
            var products = document.getElementsByClassName('product');

            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var productName = product.textContent.toLowerCase();
                if (productName.includes(filter)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            }
        }
    </script>
   <header>

        <h1>Cafés Arábicos</h1>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Pesquisar produtos" onkeyup="searchProducts()">
            <button type="submit">Pesquisar</button>
        </div>
        
    </header>
    <div class="back-link">
        <a href="../sistema.php">Voltar à Página Inicial</a>
    </div>
    <div class="container">
        <h1>Produtos</h1>
        <?php
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
        
       
        if (!isset($_SESSION['email']) || !isset($_SESSION['senha'])) {
            header('location: login.php');
        }
        $logado = $_SESSION['email'];

        // Conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "formulario");

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta para recuperar os produtos
        $sql = "SELECT * FROM produtos WHERE categoria='Arabica'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                 echo '<div class="product">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<p>{$row['descricao']} - {$row['preco']} - {$row['categoria']}</p>";
                        echo '<form method="post" action="?add=' . $row['id'] . '">';
                        echo '<button class="add-to-cart-button" type="submit">Adicionar ao Carrinho</button>';
                        echo '</form>';
                        echo '</div></div>';
            }
        } else {
            echo 'Nenhum produto disponível.';
        }
        ?>
    </div>
</body>

</html>
