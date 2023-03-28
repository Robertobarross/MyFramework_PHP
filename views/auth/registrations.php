<?php
   // Conexão com o banco de dados
   $dsn = 'mysql:host=localhost;dbname=db_myframework_php';
   $username = 'root';
   $password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}

// Recebe os dados do formulário
   $nome = $_POST['nome'];
   $email = $_POST['email'];
   $senha = $_POST['senha'];
   $repeteSenha = $_POST['repeteSenha'];

if ($senha === $repeteSenha) {
    echo "<script>alert('O usuário foi cadastrado!);window.history.go(-1)</script>";
    header('location: login');
}else{
   //
}

   // Insere os dados no banco de dados
   $stmt = $db->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, MD5(?))");
   $stmt->execute([$nome, $email, $senha]);

   echo "<script>alert('As senhas que você digitou não são iguais!');window.history.go(-1)</script>";

?>
