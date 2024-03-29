<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div id="login">
        <h1 class="titulo-login">Register</h1>

        <form action="registrations" method="POST" enctype="multipart/form-data">

        <?php // Retorna a mensagem de erro se os dados de login não estiverem corretos
           session_start();
           $mensagemDeRetorno = isset($_SESSION['msg-senha']) ? $_SESSION['msg-senha'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
           // ------------------------------------------------------------------------------
           // Cadastrado com sucesso
           $mensagemDeRetorno = isset($_SESSION['msg-cadastro']) ? $_SESSION['msg-cadastro'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
           //-------------------------------------------------------------------------------
           // O Email já existe na base de dados
           $mensagemDeRetorno = isset($_SESSION['msg-email']) ? $_SESSION['msg-email'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
        ?>
            <p><input type="text" name="nome" class="form-login" placeholder="Digite seu nome" maxlength="80" required></p>
            
            <p><input type="email" name="email" class="form-login" placeholder="Cadastre seu email" maxlength="80" required></p>
        
            <p><input type="password" name="senha" class="form-login" placeholder="Senha" maxlength="8" minlength="6" required></p>

            <p><input type="password" name="repeteSenha" class="form-login" placeholder="Confirmar senha" maxlength="8" minlength="6" required></p>

            <?php $data_cadastro = date("d/m/Y"); ?>

            <p><input type="text" name="data_cadastro" class="form-login" value="<?php echo "" . $data_cadastro; ?>" readonly style="display:none"></p>

            <p><input type="checkbox" name="checkbox" class="robo" required>Não sou um robô</p>

            <p><button type="submit" value="cadastrar" class="btn-login">Register</button>
            <input type="reset" value="limpar" class="btn-login"></p>

            <a href="login" class="links-login">login</a> |
            <a href="inicio" class="links-login">Início</a>
        </form>
    </div>   
</body>
</html>