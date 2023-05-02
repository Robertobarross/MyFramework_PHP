<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Recuperar Senha</title>
</head>
<body>
    <div id="reupera-senha">
        <br>
        <hr>
        <form method="post" action="recupera_senha">

        <?php // Retorna a mensagem de confirmando o envio do email com nova senha
           session_start();
           $mensagemDeRetorno = isset($_SESSION['msg-email']) ? $_SESSION['msg-email'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
           //--------------------------------------------------------------------------------
           // Retorna a mensagem de erro se o email não estiver correto
           $mensagemDeRetorno = isset($_SESSION['msg-email-negado']) ? $_SESSION['msg-email-negado'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
        ?>
            <p class="campos-recupera-senha">
                Digete seu email cadastrado em nossa base de dados, enviaremos uma nova senha para voê.
            </p>
            <label for="email" class="campos-recupera-senha">Email:</label>
            <input type="email" class="campos-recupera-senha" name="email" id="email" maxlength="191" required>
            <button type="submit" class="btn-recupera-senha">Enviar</button>
            <br>
            <a href="login" class="campos-recupera-senha">Login</a>
        </form>
        <br>
        <hr>
    </div>
</body>
</html>