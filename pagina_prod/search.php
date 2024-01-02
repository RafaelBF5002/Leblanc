<?php
// Verifique se a variável de pesquisa foi definida e não está vazia
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "formulario");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta para buscar produtos com base na pesquisa
    $sql = "SELECT * FROM produtos WHERE categoria = 'Gourmet' AND descricao LIKE '%$search%' LIMIT 25";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
            echo '<h2>' . $row['descricao'] . '</h2>';
            echo '<p>Preço: R$ ' . $row['preco'] . '</p>';
            echo '<p>Categoria: Café Gourmet</p>';
            echo '<form action="" method="post">';
            echo '<button type="submit">Comprar</button>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'Nenhum resultado encontrado.';
    }

    $conn->close();
}
?>
