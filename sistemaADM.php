<?php
session_start();
if((!isset($_SESSION['email']) == true and (!isset ($_SESSION['senha']) == true )))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php ');
}
$logado = $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Leblanc Café</title>
	<link rel="stylesheet" type="text/css" href="estilos_css/sistema.css">
  <script type="text/javascript">
		function redirectSobreNos() {
			window.location.href = "sobrenos.html";
		}
	</script>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="sistemaADM.php">Home</a></li>
			</ul>
			<form action="logout.php" method="post">
        		<input type="submit" value="Logout">
        	</form>
		</nav>
	</header>
	<section id="banner">
		<div class="banner-text">
			<h1>Leblanc Café</h1>
			<p>Seja bem-vindo Administrador.</p>
			
		</div>
	</section>
	<section id="featured-products">
		<h2>Opções Administrativas</h2>
		<a href="formprod.php"><div class="product-card">
			<img src="fotosprodutos/adicionarprod.svg" alt="Adicionar Produto">
			<h3>Adicionar Produtos</h3>
        </div></a>
		<a href="pagina_prod/registroscad.php"><div class="product-card">
			<img src="fotosprodutos/registros.svg" alt="Cadastros">
			<h3>Ver e Alterar Cadastros</h3>
    	</div></a>
    	<a href="pagina_prod/registroprod.php"><div class="product-card">
			<img src="fotosprodutos/deletarprod.svg" alt="Remover Produtos">
			<h3>Remover Produtos</h3>
		</div></a>
	</section>
	
	<footer>
		<p>&copy; 2023 Leblanc Café. Todos os direitos reservados.</p>
	</footer>
</body>
</html>