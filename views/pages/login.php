<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div> 
        <form action="/PROJETOS_PHP/MyFramework/views/auth/login.php" method="POST" enctype="multipart/form-data">  
            <p><input type="text" name="nome" class="campos-form" placeholder="Email" required></p>

            <p><input type="email" name="email" class="campos-form" placeholder="Email" required></p>
        
            <p><input type="password" name="senha" class="campos-form" placeholder="Senha" required></p>

            <p><button type="submit" value="cadastrar" class="btn">Logar</button>
            <input type="reset" value="limpar" class="btn"></p>
        </form>
    </div>  
</body>
</html>