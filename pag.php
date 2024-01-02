<!DOCTYPE html>
<html>
<head>
    <title>Página de Logout</title>
</head>
<body>
    <h1>Seja bem-vindo!</h1>
    
    <?php
    session_start();

    // Verificar se o usuário está logado
    if(isset($_SESSION['usuario'])) {
        echo '<p>Olá, ' . $_SESSION['usuario'] . '</p>';
        echo '<form action="logout.php" method="post">';
        echo '<input type="submit" value="Logout">';
        echo '</form>';
    } else {
        echo '<p>Você não está logado.</p>';
    }
    ?>
</body>
</html>
