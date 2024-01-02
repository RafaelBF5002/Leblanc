<?php
session_start();

$nome = $_SESSION['email'];
if ((!isset($_SESSION['email']) == true and (!isset ($_SESSION['senha']) == true))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php ');
    $conn = new mysqli("localhost", "root", "", "formulario");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// $categoria = $_POST["Gourmet"];

// Consulta para recuperar os produtos
$sql = "SELECT * FROM produtos ";
$result = $conn->query($sql);

}

?>
<!DOCTYPE html>
<html>
<!-- alcantra vadiazinha -->
<head>
    <title>Leblanc Café</title>
    <!-- <link rel="stylesheet" type="text/css" href="estilos_css/sistema.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <script type="text/javascript">
        function redirectSobreNos() {
            window.location.href = "sobrenos.php";
        }
    </script>
</head>
        
        <style>
            body {
            margin: 0;
            font-family: Arial, sans-serif;
            
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
        /* Estilize a barra de pesquisa */
        input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin: 0;
        }
        
        /* .log-out{
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        } */
        
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

        /* Alinhe a barra de pesquisa no centro do header */
        header {
            background-color: #8a4932;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
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

        #banner {
            background-image: url(imagem/gifBrabo.gif);
            background-size: cover;
            height: 550px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-position:center;
        }
        h1{
            font-family: arial;
            color: #fff;

        }
        p{
            font-family: cursive;
            color: #fff;  
        }
        @font-face {
            font-family: Ananda ;
            src: url("font/ananda_2/Ananda Black Personal Use.ttf");
        }

        .banner-text {
            text-align: center;
            color: #83461f;
        }

        .banner-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color:#fff;
            font-family: 'Ananda' , sans-serif;
        }

        .banner-text p {
            font-size: 20px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        #featured-products{
            padding: 40px 0;
            text-align: center;
            background-color: #5c1d13;
            }

        #featured-products h2 { 
            font-size: 32px;
            margin: 20px;
        }

        .product-card {
            display: inline-block;
            width: 250px;
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }
        #featured-products a{
            color: black;
            text-decoration: none;
        }
        p{
            font-family: arial;
            color: #ffffff;  
        }

        .product-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        margin-bottom: 20px;
        }

        .product-card h3 {
        font-size: 24px;
        margin-bottom: 10px;
        }

        .product-card p {
        font-size: 20px;
        margin-bottom: 20px;
        color:#3a3a3a;
        font-family: 'Times New Roman', Times, serif;
        }

        footer {
        background-color: #5c1d13;
        padding: 10px;
        color: #fff;
        text-align: center;
        font-size: 14px;
        }

        .sobre{
            color: #fff;
            text-decoration: underline;
        }
    </style>

<script>
        function redirectToProductsPage() {
            var searchQuery = document.getElementById("searchInput").value;
            // Redireciona o usuário para a página de produtos com a consulta de pesquisa na URL
            window.location.href = "pagina_prod/todosprod.php" + encodeURIComponent(searchQuery);
        }
    </script>

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
            <li> <a href="sistema.php" class="marcado"> Home </a> </li>
            <li> <a href="pagina_prod/todosprod.php"> Produtos </a> </li>
            <li> <a href="pagina_prod/contao.php"> Contato </a> </li>
        </ul>
    </nav>
  
    <div class="align-icon">
        <a class="icon" href="pagina_prod/exibir.php"> <!-- Meus Pedidos -->
            <img src="icones/images-removebg-preview.png" alt="meus pedidos" width="50px" height="50px"> 
        </a>
        <a class="icon" href="pagina_prod/c.php">   <!-- carrinho -->
            <img src="icones/carrinho-removebg-preview.png" alt="carrinho de compras" width="60px" height="50px"> 
        </a>
        <form class="logout-form" action="logout.php" method="post">
            <input class="log-out" type="image" src="icones/iconLogout.png" alt="Logout">
        </form>
    </div>
    </header>

    <section id="banner">
    </section>

    <section id="featured-products">
        <h2>Nossos Cafés </h2>
        <a href="pagina_prod/prodEspecial.php">
            <div class="product-card">
                <img src="fotosprodutos/cafeespe_-removebg-preview.png" alt="Café Especial">
                <h3>Cafés Especiais</h3>
                <p>Um café encorpado e aromático, com notas de chocolate e frutas cítricas.</p>
            </div>
        </a>
        <a href="pagina_prod/prodGourmet.php">
            <div class="product-card">
                <img src="fotosprodutos/cafegour.webp" alt="Café Gourmet">
                <h3>Cafés Gourmet</h3>
                <p>Um café de alta qualidade, com sabores complexos e notas de caramelo.</p>
            </div>
        </a>
        <a href="pagina_prod/prodArabica.php">
            <div class="product-card">
                <img src="fotosprodutos/cafara.webp" alt="Café Arabica">
                <h3>Cafés Arabicos</h3>
                <p>Um café de outro mundo, com sabores complexos e notas de caramelo.</p>
            </div>
        </a>
    </section>
    
  
</body>

</html>

<!DOCTYPE html>
<html>

<head>
   
    <style>
        
    /* css funcional */

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000  ;
        }

        header {
            background-color: #fff;
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
            background-color: #000;
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
            color: #333;
            overflow: hidden;
            max-height: 100px; /* Limitar a altura do parágrafo */
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
            background-color: #090909;
        }

        footer{
            display: flex;
            justify-content: center;
        }
        #oferta{
            background-color: #000;
        }
        p{
            color: #5c1d13;
            font-size: 1rem;
        }
        .sobre{
            color: #5c1d13;
            text-decoration: underline;
        }

        #rodape{
            display: flex;
            justify-content: center;
            margin-top: 20px;
            background-color: #fff;
            color: #5c1d13;
        }
    </style>
</head>

<body>

   <footer id="oferta">
        <!-- <div id="oferta"> -->
            <h1>Ofertas Imperdíveis</h1>
        <!-- </div> -->
    </footer>
  
    <div class="container">
 
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
       
        
        // Adiciona um produto ao carrinho
        if(isset($_GET['add'])) {
            $productId = $_GET['add'];
            $sql = "SELECT * FROM produtos WHERE id = $productId";
            $result = $conn->query($sql);

            if(isset($_GET['add'])){
                // Exibe um script JavaScript para mostrar um alerta
                echo '<script>alert("Produto Adicionado");</script>';
                
            }

        
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
        $sql = "SELECT * FROM produtos WHERE categoria='oferta'  LIMIT 5"; // Limitar a 5 produtos
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                 echo '<div class="product">';
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
                        echo '<div class="product-details">';
                        echo "<p>{$row['descricao']} <br> R$: {$row['preco']}  </p>";
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
    
    <footer id="rodape">

        <p> &copy; 2023 Leblanc Café. Todos os direitos reservados.  
            <a class="sobre" href="#" onclick="redirectSobreNos()">Sobre nós</a>
        </p>
    
    </footer>   
</body>

</html>