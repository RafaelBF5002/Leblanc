<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Leblanc</title>
    <header>

<div class="logo">
    <a href="../sistema.php">
        <h1>
            Leblanc Café
        </h1>
    </a>
</div>

<nav>
    <ul> 
        <li> <a href="../sistema.php"> Home </a> </li>
        <li> <a href="todosprod.php"> Produtos </a> </li>
        <li> <a href="contao.php" class="marcado"> Contato </a> </li>
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
            margin-bottom:20px;
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

        
        p{ 
            font-family:serif ;
            color: #fff;  
        }
        @font-face {
            font-family: Ananda ;
            src: url("../font/ananda_2/Ananda Black Personal Use.ttf");
        }

        h1 {
            color: black; /* Marrom escuro */
        }

        p {
            color: #000; /* Texto preto */
            font-size: 22px
        }

        main{
            display:flex;
            align-content: space-between ;
            flex-direction: column;
        }
        #container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            margin-bottom: 30px;
        }

        #welcome-text {
            font-size: 18px;
            margin-bottom: 20px;
            color:white;
        }

        #contact-info {
            margin-top: 20px;
        }

        #contact-info p {
            margin-bottom: 10px;
        }

        section{
            margin-top: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
        }

        fieldset{
            display: flex;
            flex-direction: column;
            margin: 10px;
        }

        form input, textarea{
            margin: 10px
        }

        input[type=submit]{
            width: 250px;
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
    <main>
    <div id="container">
        <h1>Contato</h1>

        <div id="welcome-text">
            <p>Bem-vindo à Leblanc, sua destinação premium para amantes de café em busca de uma experiência única e refinada...</p>
        </div>
        <strong>
            <p>Nossos Contatos:
                <br>
                Instagram:  @leblanc <br>
                Telefone: 1 (800) 438-2653 <br>
                Linkedin: @leblanc_cafe <br>
                Email: leblancloja@contato.com
            </p>
        </strong>

        <div id="contact-info">
            <p>Estamos localizados em Campinas-SP e você pode nos contatar pelo telefone <br> 1 (800) 438-2653 ou pelo e-mail leblancloja@contato.com.</p>
        </div>

        <p>Agradecemos por escolher a Leblanc!</p>
    </div>

    <section>
        <form method="POST" action="contao.php">
            <fieldset>
                <legend> Feedback </legend>
                <label for="nome"> Nome Completo </label>
                <input type="text" id="nome" placeholder="Insira o seu Nome">
                <label for="email"> E-mail </label>
                <input type="e-mail" id="email" placeholder="Insira um Email">
                <label for="opiniao"> Opinião</label>
                <textarea id="opiniao" name="message" rows="10" cols="30" placeholder="Diga o que achou do site!"> 
                </textarea>
                <input type="submit">
                <!-- <input type="textarea" id="opiniao" placeholder="Diga o que achou do site!"> -->
            </fieldset>  
        </form>
    </section>
    </main>

    <footer id="rodape">

        <p> &copy; 2023 Leblanc Café. Todos os direitos reservados.  
            <a class="sobre" href="../sobrenos.php" onclick="redirectSobreNos()">Sobre nós</a>
        </p>
    
    </footer>   
</body>
</html>
