<?php // Restrição a usuário não logado
// Obs. Incluir em todas as páginas onde é obrigatório estar logado
@session_start(); // Estartando a sessão

if(isset($_POST['nome'])) { // Declarando variáveis da conexão
    $nome = $_POST['nome'];
}

if(isset($_POST['email'])) { // Declarando variáveis da conexão
    $email = $_POST['email'];
}

if(isset($_POST['senha'])) { // Declarando variáveis da conexão
    $senha = $_POST['senha'];

if(isset($_POST['nivel'])) { // Declarando variáveis da conexão
        $nivel = $_POST['nivel'];
}
    if($nome == "nome" && $email == "email" && $senha == "senha" && $nivel == 'nivel') { // Se email e password estiveram cadastrados
        $_SESSION['login'] =  true; // O login será autorizado
    }
}

if(!isset($_SESSION['login'])) { // Se o usuário não tiver cadastrado será redirecionado para notAccess
    header('location: not-found');
    header('location: login');
}

?>