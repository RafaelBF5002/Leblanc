<!DOCTYPE html>
<html>
<head>
    <title>Consultar Produto</title>
</head>
<body>
    <h2>Consultar Produto</h2>
    <form action="" method="post">
        <label for="codigo">Digite o Código do Produto:</label>
        <input type="text" name="codigo" required>
        <input type="submit" value="Consultar">
    </form>

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
                    echo "Descrição: " . $produto["descricao"] . "<br>";
                    echo "Preço: " . $produto["preco"] . "<br>";

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