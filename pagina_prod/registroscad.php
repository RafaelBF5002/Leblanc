<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Registros</title>
</head>
<body>
    <header>
        <a href="../sistemaADM.php"> Retornar à página inicial </a>
    </header>
</body>
</html>

<?php
include_once('../conexaocad.php'); // Certifique-se de incluir sua conexão com o banco de dados

$sql = "SELECT * FROM cadastro";
$result = $conexao->query($sql);

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM cadastro WHERE id = $delete_id";
    $conexao->query($sql_delete);
}


if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nível</th>
                <th>Ações</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["nivelAcesso"] . "</td>";
        echo "<td><a href='?delete_id=" . $row["id"] . "'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conexao->close();
?>

