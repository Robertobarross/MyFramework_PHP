<?php
// Conexão com banco de dados
include('./database/connect.php');

// Conecta ao banco de dados
try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit;
}

// Processa o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário correspondente ao email fornecido
    $stmt = $pdo->prepare('SELECT id, nome, email, senha, nivel FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
   // $stmt->execute(['nivel' => $nivel]);
    $usuario = $stmt->fetch();

    // Verifica se o usuário existe e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        // Autenticação bem-sucedida, verifica o nível do usuário
        if ($usuario['nivel'] == 'admin') {
            // Usuário administrador, armazena o ID do usuário na sessão e redireciona para o painel de administração
            session_start();
            $_SESSION['login'] = $usuario['id'];
            header("Location: adm");
            exit;
        } elseif ($usuario['nivel'] == 'usuario') {
            // Usuário comum, armazena o ID do usuário na sessão e redireciona para o painel de usuário
            session_start();
            $_SESSION['login'] = $usuario['id'];
            header("Location: painel");
            exit;
    } else {
        // Credenciais inválidas, exibe uma mensagem de erro
        echo "<div class='erro'>
               Email ou senha inválidos.
                <br>
                Retornar | 
                <a href='login'>
                Login
                </a>
            </div>";
    }
}
}
?>

<style type="text/css">
    .erro{
        margin: 0;
        width: 97%;
        height: 10%;
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: red;
        color: white;
        text-align: center;
        padding: 20px;
    }
</style>
