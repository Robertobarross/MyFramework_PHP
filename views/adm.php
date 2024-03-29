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
       include('./config/nivel-adm.php');
    ?>    

    <br>
    <p class="titulo-adm">ADMINISTRAÇÃO</p>
    <hr>
    <button class="btn-adm">
        <a href="users" class="btn-adm">Nível acesso</a>
    </button>
</body>
</html>