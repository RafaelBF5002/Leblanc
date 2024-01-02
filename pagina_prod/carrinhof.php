<?php
// Inicia a sessão
session_start();

// Conexão com o banco de dados (substitua pelos seus próprios detalhes)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para obter os produtos do banco de dados
$sql = "SELECT id, descricao, preco, imagem FROM produtos" ;
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>
<body>

    <h1>Carrinho de Compras</h1>

    <?php
    // Exibe os produtos no carrinho
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            $imagemCodificada = base64_encode($row['imagem']);
            echo '<img src="data:image/jpeg;base64,' . $imagemCodificada . '" alt="' . $row['descricao'] . '" width="100" height="100">';
            // echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="' . $row['descricao'] . '" width="100" height="100">';
            echo '<p><strong>' . $row['descricao'] . '</strong> - R$' . number_format($row['preco'], 2) . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum produto disponível</p>';
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>

    <!-- Botão para finalizar a compra -->
    <form method="post" action="finalizar_compra.php">
        <input type="submit" value="Finalizar Compra">
    </form>

</body>
</html>
