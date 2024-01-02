<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
if(isset($_SESSION['email'])) {
    // Encerrar a sessão
    session_unset();
    session_destroy();
    
    // Redirecionar para a página de login ou qualquer outra página desejada
    header("Location: myanimelist.php");
    exit();
} else {
    // Caso o usuário não esteja logado, redirecionar para alguma página de erro ou mensagem
    header("Location: erro.php");
    exit();
}
?>
