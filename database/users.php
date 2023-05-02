<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Nível de acesso</title>
</head>
<body>
        <?php
        include('./views/template.php');
        ?>
        
        <br>
        <h1 class="text-adm">Pesquisar usuários para conceder nível de acesso</h1>
        <p class="text-adm">Pesquise o usuário que deseja encontrar pelo endereço de email ou nome</p>

        <?php // Retorna a mensagem confirmando a atulização do nível
           $mensagemDeRetorno = isset($_SESSION['msg-nivel']) ? $_SESSION['msg-nivel'] : '';
           if(!empty($mensagemDeRetorno))
           {
               echo $mensagemDeRetorno;
           }
        ?>

        <br>
        <form action="" method="post" class="users-search">
		<input type="text" name="email" class="users-search" placeholder="Pesquisar" maxlength="200">
		<input type="submit" value="Ir">
	</form>
        <hr>
        
        <?php
          include('./config/restriction.php');
          include('./config/nivel-adm.php');
          include('editNivel.php');
        ?>
</body>
</html>

<style>
.text-adm{
        font-size: 17px;
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 17%;


}
.users-search{
        width: 50%;
        height: auto;
        margin-left: 4%;
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
        color: #808080;

}
</style>