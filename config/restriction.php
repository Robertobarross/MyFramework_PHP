<?php // Restrição a usuário não logado
// Obs. Incluir em todas as páginas onde é obrigatório estar logado
session_start(); // Estartando a sessão

if(isset($_POST['email'])) { // Declarando variáveis da conexão
    $email = $_POST['email'];
}

if(isset($_POST['password'])) { // Declarando variáveis da conexão
    $password = $_POST['password'];

    if($email == "email" and $password == "password") { // Se email e password estiveram cadastrados
        $_SESSION['login'] =  true; // O login será autorizado
    }
}

if(!isset($_SESSION['login'])) { // Se o usuário não tiver cadastrado será redirecionado para notAccess
    header('location:');
}

?>