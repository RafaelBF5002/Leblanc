<?php
if (isset($_POST['submit']))
{
	include_once('conexaocad.php');
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$data = $_POST['datanasc'];
	$senha = $_POST['senha'];
	$endereco = $_POST['endereco'];
	$result = mysqli_query($conexao,"INSERT INTO cadastro (nome, email, senha, endereco, datanasc )
	 VALUES ('$nome','$email','$senha','$endereco', '$data')");

	if ($result) {
		// Redirecionamento após o cadastro bem-sucedido
		header('Location: login.php');
		exit; // Certifique-se de sair após o redirecionamento
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulário de Cadastro</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #5c1d13;
			margin: 0;
			padding: 0;
		}

		main{
			display: flex;
			justify-content: center;

		}

		form {
			width: 300px;
			margin: 20px auto;
			padding: 20px;
			background-color: #000;
			border: 1px solid #010101;
			border-radius: 5px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		label {
			color: white;
			display: block;
			margin-bottom: 5px;
			/* font-weight: bold; */
		}

		input[type=text], [type=password], [type=date] {
			padding: 10px;
			border-radius: 3px;
			border: 1px solid #ccc;
			width: 100%;
			box-sizing: border-box;
			margin-bottom: 10px;
			background-color: #f1e3cc;
		}

		input[type=submit] {
			background-color: #FF4000;
			color: white;
			padding: 10px;
			border-radius: 5px;
			border: none;
			cursor: pointer;
			width: 100%;
		}
		
		input[type=submit]:hover {
			background-color: #ff3000;
		}
	</style>
</head>
<body>
	<main>
		<form action="formcad.php" method="post"> 
			<label for="nome">Digite seu Primeiro Nome:</label>
			<input type="text" id="nome" name="nome" placeholder="Insira o nome" required>
			
			<label for="email">Informe um E-mail válido:</label>
			<input type="text" id="email" name="email" placeholder="Insira um e-mail" required>
			
			<label for="senha">Digite uma Senha:</label>
			<input type="password" id="senha" name="senha" placeholder="Insira uma senha de até 20 caracteres" required>

			<label for="endereco">Digite seu Endereço:</label>
			<input type="text" id="endereco" name="endereco" placeholder="Insira o endereço" required>

			<label for="data">Informe sua Data de Nascimento:</label>
			<input type="date" id='data' name="datanasc" required>

			<input type="submit" name="submit" id="submit" value="Cadastrar">
		</form>
	</main>
</body>
</html>
