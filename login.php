<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Cadastro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('imagem/cafegiffoda.gif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
           
            color: #000; /* Bege claro */
            text-align: center;
            padding: 20px;
      
        }

        a {
            color: #ff8c42; /* Laranja */
            text-decoration: none;
            font-weight: bold;
        }

        main {
            background-color: #000; /* Marrom mais escuro */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
            width: 300px;
            max-width: 90%;
            text-align: center;
        }

        .logo img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #f6f3f0; /* Bege claro */
        }

        input[type=email], [type=password] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #9b7d67; /* Marrom médio */
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            color: #6d513b; /* Marrom mais escuro */
            background-color: #f1e3cc; /* Bege mais claro */
        }

        input[type=submit] {
            background-color: #FF4000; /* Laranja */
            color: #f6f3f0; /* Bege claro */
            padding: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        input[type=submit]:hover {
            background-color: #ff6b00; /* Laranja mais escuro */
        }
    </style>
</head>
<body>
    <!-- <header>
        <h1> Bem-vindo ao Café Leblanc, para acessar: <a href="formcad.php">Cadastre-se</a> ou faça Login</h1>
    </header> -->
    <main>
        <div class="logo">
            <img src="icones/Leblanc.png" alt="Logo Café Leblanc">
        </div>
        <form action="conexaolog.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Informe seu E-mail:">
            
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Informe sua Senha:">

            <input type="submit" name="submit" value="Entrar">
        </form> 
    </br>
        <a href="formcad.php"> Cadastre-se</a> 
    </main>
</body>
</html>
