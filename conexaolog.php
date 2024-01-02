<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('conexaocad.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM cadastro WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $pagina_destino = "login.php";
        header("Location: " . $pagina_destino);
        exit();
    } 
    else {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        
        // Verificar o nível do usuário
        if ($row['nivelAcesso'] == 1) {
            $pagina_destino = "sistemaADM.php"; // Página do administrador
        } else {
            $pagina_destino = "sistema.php"; // Página de usuário comum
        }
        
        header("Location: " . $pagina_destino);
        exit();
    }
} else {
    header('Location: login.php');
}
?>