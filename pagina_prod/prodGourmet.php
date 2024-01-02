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
        
        session_start();
        ?>

<!DOCTYPE html>
<html>

<head>
    <title>Venda de Produtos Gourmet</title>
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

        .search-bar {
            background-color: #fff;
            text-align: center;
            padding: 20px;
        }

        .search-bar input[type="text"] {
            width: 40%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            text-align: center;
            border-radius: 5px;
        }

        .search-bar button {
            background-color: #5b1f00;
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
            width: 10%; /* Ajustado para exibir 4 produtos por linha */
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

        

    .product a   {

text-decoration: none;
color:#000;
        

    } 

            
        

        .add-to-cart-button {
            background-color: #000;
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
<div class="logo">
        <a href="../sistema.php">
            <h1>
                Leblanc Café
            </h1>
        </a>
    </div>


    <div class="utilitarios">
        <ul> 
            <li> <a href="../sistema.php" > Home </a> </li>
            <li> <a class="marcado"> Produtos </a> </li>
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

    <div class="search-bar">
        <input type="text" id="search-input" placeholder="Pesquisar produtos" onkeyup="searchProducts()">
        <button type="submit">Pesquisar</button>
    </div>
        
    <?php
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
        $sql = "SELECT * FROM produtos where categoria='gourmet' ";      
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<a href='descricao.php?id=" . $row["id"] . "'>" . $row["descricao"]. "  R$" . $row["preco"]. "</a>";
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
