<?php
include('connect.php');
include('./config/restriction.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter a nova senha do formulário
    @$id = $_POST['id'];
    @$nova_senha = password_hash($_POST['nova_senha'], PASSWORD_DEFAULT);
    
    // Obter o ID do usuário logado
    @$id = $_POST['id'];
    
    // Atualizar a senha do usuário no banco de dados
    @$stmt = $conn->prepare('UPDATE users SET senha = ? WHERE id = ?');
    @$stmt->execute([$nova_senha, $id]);
    
    // Redirecionar para a página de perfil do usuário (substitua pela sua própria página)
    @$repetir_senha = $_POST['repetir_senha'];
    if ($_POST['nova_senha'] != $_POST['repetir_senha']) { 
        session_start();
        $_SESSION['msg-senha-negado'] = "<div class='msg-negado'>
        As senhas não são iguais!
        </div>";
        header('location: profile');
        exit();
    }else{
        session_start();
        $_SESSION['msg-senha-sucesso'] = "<div class='msg-sucesso'>
        Senha alterada com sucesso!
        </div>";
        header('location: profile');
    }
}
?>

<style type="text/css">
    .msg-negado{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    background-color: red;
    color: #F8F8FF;
}
.msg-sucesso{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    background-color: green;
    color: #F8F8FF;
}
</style>
