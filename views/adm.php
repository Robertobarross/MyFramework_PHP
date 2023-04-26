<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Administração</title>
</head>
<body>
    <?php
       include('./config/restriction.php');
       include('template.php');
       include('./database/connect.php');

       
      // session_start();
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
           // Nível de acesso inválido, exibe uma mensagem de erro e redireciona para a página de login
           echo "<div class='erro'>
                  Você não tem permissão para acessar esta página.
                   <br>
                   Retornar | 
                   <a href='login'>
                   Login
                   </a>
               </div>";
           exit;
       }
       
       
       






    ?>    

    <br>
    <p class="titulo-adm">ADMINISTRAÇÃO</p>
    <hr>
</body>
</html>