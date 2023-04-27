<?php
       include('./config/restriction.php');
    
       if (!isset($_SESSION['login'])) {
           // Usuário não autenticado, redireciona para a página de login
           header("Location: login");
           exit;
       }
       
       // Busca o usuário correspondente ao ID armazenado na sessão
       $stmt = $conn->prepare('SELECT id, nome, email, senha, nivel FROM users WHERE id = :id');
       $stmt->execute(['id' => $_SESSION['login']]);
       $usuario = $stmt->fetch();
       
       // Verifica se o nível de acesso do usuário permite o acesso a esta página
       if ($usuario['nivel'] != 'admin') {
           // Nível de acesso inválido, exibe uma mensagem de erro e redireciona para a página painel
           $_SESSION['mensagem'] = "<div class='msg-negado'>
           Acesso negado! Entre em contato com o Administrador. 
           </div>";
           header('location: painel');
           exit;
    }
?>  