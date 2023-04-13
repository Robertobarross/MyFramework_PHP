<?php
include('connect.php');
include('./config/restriction.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter a nova senha do formulário
    $id = $_POST['id'];
    $nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
    
    // Obter o ID do usuário logado
    $id = $_POST['id'];
    
    // Atualizar a senha do usuário no banco de dados
    $stmt = $conn->prepare('UPDATE users SET senha = ? WHERE id = ?');
    $stmt->execute([$nova_senha, $id]);
    
    // Redirecionar para a página de perfil do usuário (substitua pela sua própria página)
    header('Location: perfil.php');
    exit();
}
?>
