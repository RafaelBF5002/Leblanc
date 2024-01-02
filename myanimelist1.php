<!DOCTYPE html>
<html>
<head>
	<title>Leblanc Café</title>
	<link rel="stylesheet" type="text/css" href="estilos_css/Estilo.css">
  <script type="text/javascript">
		function redirectSobreNos() {
			window.location.href = "sobrenos.html";
		}
	</script>
</head>
<body>
	<header> 
		
	<div class="logo">
        <h1>
            Leblanc Café
        </h1>
    </div>
		<nav>
			<ul>
				<li><a href="myanimelist.php">Home</a></li>
				<li><a href="#" onclick="redirectSobreNos()">Sobre nós</a></li>
				<li><a href="#">Contato</a></li>
				<li><a href="login.php" class="btn" id="login-btn">Login</a></li>
			</ul>
		</nav>
	</header>
	<section id="banner">
		<div class="banner-text">
			<h1>Leblanc Café</h1>
			<p>Descubra a autenticidade e o sabor dos melhores cafés brasileiros.</p>
			<a href="login.php" class="btn" id="btnC">Conheça nossos produtos</a>
		</div>
	</section>
	<section id="featured-products">
		<h2>Produtos em Destaque</h2>
		<div class="product-card">
			<img src="imagem/cafeimagem8.webp" alt="Café Especial">
			<h3>Café Especial</h3>
			<p>Um café encorpado e aromático, com notas de chocolate e frutas cítricas.</p>
		</div>
		<div class="product-card">
			<img src="imagem/cafeimagem14.webp" alt="Café Gourmet">
			<h3>Café Gourmet</h3>
			<p>Um café de alta qualidade, com sabores complexos e notas de caramelo.</p>
    	</div>
    	<div class="product-card">
			<img src="imagem/cafeimagem4.png" alt="Café Arabica">
			<h3>Café Arabica</h3>
			<p>Um café de outro mundo, com sabores complexos e notas de caramelo.</p>
		</div>
	</section>
	
	<footer>
		<p>&copy; 2023 Leblanc Café. Todos os direitos reservados.</p>
	</footer>
</body>
</html>