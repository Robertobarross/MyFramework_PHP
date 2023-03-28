<?php
// Conexão com banco de dados
$dsn = 'mysql:host=localhost;dbname=db_myframework_php';
$username = 'root';
$password = '';

$conn = new PDO($dsn, $username, $password);

// Campos do formulário de login
@$email = $_POST['email'];
@$senha = $_POST['senha'];

// Verifica se usuário e senha estão cadastrados
$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email AND senha = MD5(:senha)");
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);
$stmt->execute();

// Se o usuário estiver cadastrado e os campos digitados corretamente, o login será efetuado.
if ($stmt->rowCount() == 1) {
    session_start();
    $_SESSION['login'] = true;
    header("Location: dashboard");
} else {
    // Se as informações não existirem ou incorretas
    echo "<script>alert('Usuário ou senha incorretos!');window.history.go(-1)</script>";
}
?>
