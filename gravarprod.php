<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $descricao = $_POST["descricao"];
    $descricao2 = $_POST["descricao2"];
    $preco = $_POST["preco"];
    $categoria = $_POST["categoria"];
    $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]);

    $conexao = mysqli_connect("localhost", "root", "", "formulario");
    if ($conexao) {
        $imagem = mysqli_real_escape_string($conexao, $imagem);

        $query = "INSERT INTO produtos (codigo_produto, descricao, preco, imagem, descricao2,  categoria)
                  VALUES ('$codigo', '$descricao', '$preco', '$imagem', '$descricao2','$categoria')";
       
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            echo "Produto inserido com sucesso!";
        } else {
            echo "Erro ao inserir o produto: " . mysqli_error($conexao);
        }

        mysqli_close($conexao);
    } else {
        echo "Erro ao conectar ao banco de dados.";
    }

    header("Location: formprod.php");
    exit();
}
?>
