<?php
@include('./config/restriction.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Painel</title>
</head>
<body>    
    <?php
       @include('template.php');
    ?>
    
    <div id="painel">
        <p class="titulo-painel">PAINEL</p> 
        <p class="titulo-painel">Bem vindo ao painel!</p>  
        <hr>  

        <?php // Retorna a mensagem da view adm, "Acesso negado"
           $mensagemDeRetorno = isset($_SESSION['mensagem']) ? $_SESSION['mensagem'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
        ?>
    </div>
</body>
</html>