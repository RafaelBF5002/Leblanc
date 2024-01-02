<?php
session_start();

if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    // Configuração do banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $total = 0;

    // Inserir cada produto no carrinho na tabela de pedidos
    foreach ($_SESSION['carrinho'] as $item) {
        $productId = $item['id'];
        $productName = $item['nome'];
        $productPrice = $item['preco'];
        
        // Inserir o produto na tabela de pedidos
        $insertQuery = "INSERT INTO pedidos (id_produto, nome_produto, preco_produto) VALUES ('$productId', '$productName', '$productPrice')";
        $conn->query($insertQuery);

        $total += $item['preco'];
    }

    // Limpar o carrinho após o processamento do pedido
    unset($_SESSION['carrinho']);

    // Redirecionar para uma página de sucesso ou exibir uma mensagem de sucesso
    header("Location: sucesso.php");
} else {
    // Redirecionar para uma página de erro ou exibir uma mensagem de erro
    header("Location: erro.php");
}
?>
