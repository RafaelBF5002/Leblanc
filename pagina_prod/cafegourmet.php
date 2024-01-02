<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Café Gourmet</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  header {
    background-color: #333;
    color: white;
    padding: 1rem 0;
  }

  nav ul {
    list-style-type: none;
    padding: 0;
  }

  nav ul li {
    display: inline;
    margin-right: 20px;
  }

  nav ul li a {
    color: white;
    text-decoration: none;
  }

  nav ul li a:hover {
    text-decoration: underline;
  }

  footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1rem 0;
    bottom: 0;
    width: 100%;
  }
  .container{
    display: flex;
    justify-content: center;
    flex-direction: column;
  }
  .product {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px;
    /* display: flex;
    justify-content: center; */
  }

  .product h2 {
    margin-top: 0;
  }

  .product img {
    max-width: 300px;
    max-height: 300px;
  }
</style>
</head>

<body>
  <header>
		<nav>
			<ul>
				<li><a href="../sistema.php">Home</a></li>
				<li><a href="#" onclick="redirectSobreNos()">Sobre nós</a></li>
				<li><a href="#">Contato</a></li>	
			</ul>
		</nav>
	</header>
<div class="container">
<?php
session_start();
print_r('LOGADO');
if((!isset($_SESSION['email']) == true and (!isset ($_SESSION['senha']) == true )))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php ');
}
$logado = $_SESSION['email'];
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "formulario");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// $categoria = $_POST["Gourmet"];

// Consulta para recuperar os produtos
$sql = "SELECT * FROM produtos where categoria = 'Gourmet'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<h2>' . $row['id'] . '</h2>';
        echo '<p>' . $row['descricao'] . '</p>';
        echo '<p>Preço: R$ ' . $row['preco'] . '</p>';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
        // echo '<p>' . $row['categoria'] . '</p>';
        echo '<p> Café Gourmet </p>'  ;
        echo '<form action="" method="post">';
        echo '<input type="submit" value="comprar">';
        echo '<form>';
        echo '</div>';
    }
} else {
    echo 'Nenhum produto disponível.';
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
</div>
<footer>
  <p>&copy; 2023 Leblanc Café. Todos os direitos reservados.</p>
</footer>
    
</body>
</html>

