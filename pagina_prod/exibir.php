<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
session_start();

if ((!isset($_SESSION['email']) == true and (!isset ($_SESSION['senha']) == true))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('location: login.php ');
}
$logado = $_SESSION['email'];
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "formulario");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Exibir Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #5c1d13;
            margin: 0;
            padding: 0;
        }

        @font-face {
            font-family: Ananda ;
            src: url("../font/ananda_2/Ananda Black Personal Use.ttf");
        }

        header {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 10px 0;
            margin-bottom: 20px;
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

        nav{
            background-color: #fff;
            margin: 0 25px 0 25px;
            padding: 10px 0;
        }

        .utilitarios{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .utilitarios ul {
            display: flex;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .utilitarios ul li {
            margin-right: 10px;
        }

        .utilitarios ul li a {
            font-family: serif;
            color: #5b1f00;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .marcado{
            border-bottom: 1px solid #5b1f00;
        }

        .icon{
            margin: 0 10px 0 10px;
            cursor: pointer;
        }

        #pedido{
            border-bottom: 2px solid #000; 
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

        h1 {
            text-align: center;
            padding: 20px 0;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #000;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td[colspan="5"] {
            text-align: center;
            padding: 20px;
        }

        /* Estilo para o botão Home */
        a.button-home {
            display: block;
            background-color: #333;
            color: #f2f2f2;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border: 2px solid #333;
            border-radius: 5px;
            position: absolute;
            top: 10px;
            left: 10px;
        }

       
    </style>
</head>

<body>

<header>
<div class="logo">
        <a href="../sistema.php">
            <h1>
                Leblanc Café
            </h1>
        </a>
    </div>


    <div class="utilitarios">
        <ul> 
            <li> <a href="../sistema.php"> Home </a> </li>
            <li> <a href="todosprod.php"> Produtos </a> </li>
            <li> <a href="contao.php"> Contato </a> </li>
        </ul>
    </div>

    <div class="align-icon">
        <a class="icon" id="pedido" href="exibir.php"> <!-- Meus Pedidos -->
            <img src="../icones/images-removebg-preview.png" alt="meus pedidos" width="50px" height="50px"> 
        </a>
        <a class="icon" id="carrinho" href="c.php">   <!-- carrinho -->
            <img src="../icones/carrinho-removebg-preview.png" alt="carrinho de compras" width="60px" height="50px"> 
        </a>
        <form class="logout-form" action="../logout.php" method="post">
            <input class="log-out" type="image" src="../icones/iconLogout.png" alt="Logout">
        </form>
    </div>
</header>

    <!-- <a class="button-home" href="../sistema.php">Home</a>

    <h1>Meus Pedidos</h1> -->
    <table>
        <tr>
            <th>ID Pedido</th>
            <th>ID Produto</th>
            <th>Nome do Produto</th>
            <th>Preço do Produto</th>
            <th>Data do Pedido</th>
        </tr>
        <?php
        
        $sql = "SELECT * FROM pedidos";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_pedido"] . "</td>";
                echo "<td>" . $row["id_produto"] . "</td>";
                echo "<td>" . $row["nome_produto"] . "</td>";
                echo "<td>" . $row["preco_produto"] . "</td>";
                echo "<td>" . $row["data_pedido"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum pedido encontrado.</td></tr>";
        }
        ?>
    </table>
</body>

</html>
