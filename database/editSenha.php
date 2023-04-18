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
        echo "<div style='background-color: red; 
                  text-align: center; 
                  font-size: 18px; 
                  color: white; 
                  font-family: Arial;
                  height: 10%;
                  padding: 20px; '>
                   As senhas não são iguais! Retorne para o Perfil para corrigir.
                 <br>
                   Retornar | 
                <a href='profile'>
                   Perfil
                </a>
              </div>";
        exit();
    }else{
        echo "<div style='background-color: green; 
                text-align: center; 
                font-size: 18px; 
                color: white; 
                font-family: Arial;
                height: 10%;
                padding: 20px; '>
                   Senha alterada com sucesso!
                <br>
                   Click em continuar para testar sua nova senha | 
                <a href='logout'>
                   Continuar
                </a>
              </div>";
    }
}
?>
