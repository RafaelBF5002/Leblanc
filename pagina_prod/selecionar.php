<?php
session_start(); // Inicia a sessão

// Simulação de um produto no carrinho (substitua isso pela lógica real do seu carrinho)
// $_SESSION['carrinho'][] = $cartItem;

// Processar o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar qual método de pagamento foi selecionado
    if (isset($_POST["metodo_pagamento"])) {
        $metodo_pagamento_selecionado = $_POST["metodo_pagamento"];

        // Armazenar o método de pagamento na sessão
        $_SESSION["metodo_pagamento"] = $metodo_pagamento_selecionado;

        // Redirecionar para diferentes páginas com base no método de pagamento
        switch ($metodo_pagamento_selecionado) {
            case "credito":
                header("Location: credito.php");
                break;
            case "debito":
                header("Location: debito.php");
                break;
            default:
                // Redirecionar para uma página padrão ou mostrar uma mensagem de erro
                header("Location: pagina_padrao.php");
                break;
        }
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
       
    }
}



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <title>Seleção de Método de Pagamento</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #5c1d13  ;
        }

        header {
            background-color: #fff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
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
            src: url("../font/ananda_2/Ananda Black Personal Use.ttf");
        }

        form {
            background-color: #fff;
            padding: 20px;
            width:10px
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }


        h2{
            color:white;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        main{
            margin: 0 40% 0 40%;
            text-align: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 300px;
        }
    </style>
</head>
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
        <li> <a href="../sistema.php" class="marcado"> Home </a> </li>
        <li> <a href="todosprod.php"> Produtos </a> </li>
        <li> <a> Contato </a> </li>
    </ul>
</nav>

<div class="align-icon">
    <a class="icon" href="exibir.php"> <!-- Meus Pedidos -->
        <img src="../icones/images-removebg-preview.png" alt="meus pedidos" width="50px" height="50px"> 
    </a>
    <a class="icon" href="c.php">   <!-- carrinho -->
        <img src="../icones/carrinho-removebg-preview.png" alt="carrinho de compras" width="60px" height="50px"> 
    </a>
    <form class="logout-form" action="logout.php" method="post">
        <input class="log-out" type="image" src="../icones/iconLogout.png" alt="Logout">
    </form>
</div>
</header>
<main>
<h2>Escolha o Método de Pagamento </h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="credito">
        <input type="radio" id="credito" name="metodo_pagamento" value="credito"> Cartão de Crédito
    </label><br>
    
    <label for="debito">
        <input type="radio" id="debito" name="metodo_pagamento" value="debito"> Cartão de Débito
    </label><br>

    <input type="submit" value="Selecionar Método de Pagamento">
</form>
<main>


</body>
</html>
