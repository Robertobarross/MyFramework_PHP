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
    $usuario = $stmt->fetch();

    if($senha != 'senha'){
        // Se a senha ou email estiverem erradas
        session_start();
        $_SESSION['msg'] = "<div class='msg-negado'>
        Email ou senha incorretos!
        </div>";
        header('location: login');
       // exit;
    } 

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
    } 
}
}
?>

<style type="text/css">
    .erro{
        font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        background-color: red;
        color: #F8F8FF;
    }
</style>
