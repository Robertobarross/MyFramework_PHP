<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div id="login"> 
        <h1 class="titulo-login">Login</h1>
        <!-- Formulário de login -->
        <form action="logar" method="POST" enctype="multipart/form-data">  

        <?php // Retorna a mensagem de erro se os dados de login não estiverem corretos
           session_start();
           $mensagemDeRetorno = isset($_SESSION['msg']) ? $_SESSION['msg'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
        ?>

            <p><input type="email" name="email" class="form-login" placeholder="Email" maxlength="80" required></p>
        
            <p><input type="password" name="senha" class="form-login" placeholder="Senha" maxlength="8" minlength="6" required></p>

            <p><input type="checkbox" name="checkbox" class="robo" required>Não sou um robô</p>

            <p><button type="submit" value="cadastrar" class="btn-login">Logar</button>
            <input type="reset" value="limpar" class="btn-login"></p>

            <a href="register" class="links-login">Register</a> |
            <a href="inicio" class="links-login">Início</a> |
            <a href="recuperarSenha" class="links-login">Esqueci minha senha</a>
        </form>
    </div>  
</body>
</html>