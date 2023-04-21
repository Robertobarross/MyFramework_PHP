<?php
// Conecta ao banco de dados
include('connect.php');
require './PHPMailer-master';

// Recuperar senha
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Conexão com o banco de dados
   // $pdo = new PDO('mysql:host=localhost;dbname=seu_banco_de_dados', 'seu_usuario', 'sua_senha');

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

        echo 'Uma nova senha foi enviada para o seu e-mail.';
    } else {
        echo 'O endereço de e-mail informado não está registrado.';
    }
}
?>
