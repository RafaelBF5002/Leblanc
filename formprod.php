<!DOCTYPE html>
<html>
<head>
    <title>Inserir Produto</title>
    <style>
        body {
            background-color: #f0f0f0;
            color: #333;
            font-family: Arial, sans-serif;
        }
        a {
            color: #333;
            text-decoration: none;
        }
        h2 {
            color: #666;
        }
        label {
            color: #444;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }
        input[type="submit"] {
            padding: 8px 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form {
            margin-bottom: 20px;
        }
        img {
            max-width: 200px;
        }
    </style>
</head>
<body>
    <a href="sistemaADM.php">Retornar à página inicial</a>
    <h2>Inserir Produto</h2>
    <form action="gravarprod.php" method="post" enctype="multipart/form-data">
        <label for="codigo">Código do Produto:</label>
        <input type="text" name="codigo" required><br>
       
        <label for="descricao">Nome:</label>
        <input type="text" name="descricao" required><br>
       
        <label for="preco">Preço:</label>
        <input type="number" step="0.01" name="preco" required><br>
       
        <label for="imagem">Imagem:</label>
        <input type="file" name="imagem"><br>

        <label for="descricao2">Descrição:</label>
        <input type="text" name="descricao2" required><br>

        <input type="radio" id="especial" name="categoria" value="Especial">
        <label for="especial">Café Especial</label><br>

        <input type="radio" id="gourmet" name="categoria" value="Gourmet">
        <label for="gourmet">Café Gourmet</label><br>

        <input type="radio" id="arabica" name="categoria" value="Arabica">
        <label for="arabica">Café Arabica</label>
        <br>
        <input type="submit" value="Inserir Produto">
    </form>
    
    <h2>Consultar Produto</h2>
    <form action="" method="post">
        <label for="codigo">Digite o Código do Produto:</label>
        <input type="text" name="codigo" required>
        <input type="submit" value="Consultar">
    </form>
    <?php
    // O código PHP permanece inalterado.
    ?>
</body>
</html>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $codigo_consulta = $_POST["codigo"];

        $conexao = mysqli_connect("localhost", "root", "", "formulario");
        if ($conexao) {
            $query = "SELECT * FROM produtos WHERE codigo_produto = '$codigo_consulta'";
            $resultado = mysqli_query($conexao, $query);

            if ($resultado) {
                $produto = mysqli_fetch_assoc($resultado);

                if ($produto) { 
                    echo "<h3>Dados do Produto:</h3>";
                    echo "Código do Produto: " . $produto["codigo_produto"] . "<br>";
                    echo "Nome: " . $produto["descricao"] . "<br>";
                    echo "Descrição: " . $produto["descricao2"] . "<br>";
                    echo "Preço: " . $produto["preco"] . "<br>";
                    echo "Categoria: " . $produto["categoria"] . "<br>";

                    if ($produto["imagem"]) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($produto["imagem"]) . '" alt="Imagem do Produto" width="200"><br>';
                    } else {
                        echo "Imagem não disponível.<br>";
                    }
                } else {
                    echo "Produto não encontrado.";
                }
            } else {
                echo "Erro ao consultar o produto: " . mysqli_error($conexao);
            }

            mysqli_close($conexao);
        } else {
            echo "Erro ao conectar ao banco de dados.";
        }
    }
    ?>
</body>
</html>