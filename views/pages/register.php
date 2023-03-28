<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/styles.css">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <div>
        <form action="registrations" method="POST" enctype="multipart/form-data">
            <p><input type="text" name="nome" class="campos-form" placeholder="Cadastrar nome do usuário" required></p>
            
            <p><input type="email" name="email" class="campos-form" placeholder="Cadastrar e-mail" required></p>
        
            <p><input type="password" name="senha" class="campos-form" placeholder="Cadastrar senha com no máximo 8 caracteres" maxlength="8" required></p>

            <p><input type="password" name="repeteSenha" class="campos-form" placeholder="Cadastrar senha com no máximo 8 caracteres" maxlength="8" required></p>

            <p><button type="submit" value="cadastrar" class="btn">Cadastrar</button>
            <input type="reset" value="limpar" class="btn"></p>
        </form>
    </div>   
</body>
</html>