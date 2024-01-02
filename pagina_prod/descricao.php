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
        
        <div class="cart">
        </div>
        
        
        
        
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
    
        <title>Descrição do Produto</title>


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
                            margin-bottom: 20px;
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
                
                        /* #carrinho{
                            border-bottom: 2px solid #000; 
                        } */
                
                        .align-icon{
                            align-items: center;
                            display: flex;
                            justify-content: space-between;
                        }
                
                        .log-out{
                            margin: 20px 25px 0 10px;
                            height: 50px;
                            width: 50px;
                        }
                
                        .container {
                            border: 1px solid #ddd;
                            width: 75%;
                            margin: 0 auto;
                            padding: 20px;
                            background-color: #fff;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                        }
                
                        .product {
                            border: 1px solid #fff;
                            padding: 20px;
                            margin: 20px;
                            display: flex;
                            /* width: 14%; Ajustado para exibir 4 produtos por linha */
                            background-color: #fff;
                            overflow: hidden; /* Limitar o conteúdo dentro do container */
                        }
                
                        .product img {
                            /* max-width: 100%; */
                            width: 500px;
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
                            font-size: 26px;
                            /* overflow: hidden; */
                            max-height: 100px; /* Limitar a altura do parágrafo */

                        }
                        /* .product-details{
                            display: flex;
                            flex-direction: column;
                        } */
                
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
        <?php
                $sql = "SELECT * FROM produtos WHERE id = $produto_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="product" id="product_' . $row['id'] . '">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<p>{$row['descricao']}    <br>    <br>  R$:  {$row['preco']}   <br>  <hr> {$row['descricao2']}  </p>";
                        // echo "<p>{$row['descricao']}    <br>      R$:  {$row['preco']}   <br>   {$row['categoria']} <br>Peso: {$row['descricao2']} </p>";
                        // echo '<form method="post" action="?add=' . $row['id'] . '">';
                        // ?add=' . $row['id'] . '
                        // echo '<button type="submit" onclick="adicionarAoCarrinho(' . $row['id'] . ')">Adicionar ao Carrinho</button>';
                        // echo '</form>';
                        echo '<button type="button" class="add-to-cart-button" data-product-id="' . $row['id'] . '">Adicionar ao Carrinho</button>';
                        echo '</div></div>';
                    }
                } else {
                    echo "<p>Nenhum produto disponível.</p>";
                }
                ?>
    <script>
document.addEventListener("DOMContentLoaded", function() {
    var addToCartButtons = document.querySelectorAll('.add-to-cart-button');

    addToCartButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var productId = this.getAttribute('data-product-id');
            addToCart(productId);
        });
    });

    function addToCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'descricao.php?add=' + productId, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                // Aqui você pode manipular a resposta do servidor, se necessário
                // Por exemplo, atualizar o conteúdo do carrinho, exibir uma mensagem, etc.
                alert('Produto adicionado ao carrinho!');
            } else {
                alert('Ocorreu um erro ao adicionar o produto ao carrinho.');
            }
        };

        xhr.send();
    }
});
</script>

</body>
</html>
    <?php
    
    $conexao->close();
} else {
    
    exit();
}