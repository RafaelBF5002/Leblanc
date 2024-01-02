<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exibir Registros</title>
<style>
    img{
        height: 300px;
        width: 300px;
    }
</style>    
</head>
<body>
<a href="../sistemaADM.php"> Retornar à página inicial </a> 
  <h1>Registros de Produtos</h1>
<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "formulario");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificação se algum produto foi selecionado para exclusão
if(isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $sql_delete = "DELETE FROM produtos WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Registro excluído com sucesso." . "<br>";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}
// OQUE VOCE NÃO TOMA, EU TOMO EM DOBRO  -RAFAEL CASSINO
// MEU NOME É MATHEUS - MATÉUS ALCANTRY
// QUEM ASSASSINOU O POGAHORSE - JOÃO BALADEIRO
// Consulta para recuperar os produtos 
$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<h2>' . $row['id'] . '</h2>';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do produto">';
        echo '<p>' . $row['descricao'] . '</p>';
        echo '<p>Preço: R$ ' . $row['preco'] . '</p>';
        echo '<p>' . $row['categoria'] . '</p>';
        echo '<form method="post">';
        echo '<input type="hidden" name="delete_id" value="' . $row['id'] . '">';
        echo '<input type="submit" value="Excluir">';
        echo '</form>';
        echo '</div>';
    }
} else {
    echo 'Nenhum produto disponível.';
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

</body>
</html>
