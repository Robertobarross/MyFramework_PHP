<?php
// Conecta ao banco de dados
include('connect.php');

// Recuperar senha
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Verificar se o e-mail está registrado
    $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // Gerar nova senha aleatória
        $nova_senha = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);

        // Atualizar senha no banco de dados
        $stmt = $conn->prepare('UPDATE users SET senha = :senha WHERE id = :id');
        $stmt->execute(['senha' => password_hash($nova_senha, PASSWORD_DEFAULT), 'id' => $usuario['id']]);

        // Enviar e-mail com nova senha
        $assunto = 'Nova senha de acesso';
        $mensagem = 'Sua nova senha é: ' . $nova_senha;
        mail($email, $assunto, $mensagem);

        echo 'Uma nova senha foi enviada para o seu email.';
    } else {
        echo 'O email informado não está cadastrado em nossa base de dados.';
    }
}
?>
