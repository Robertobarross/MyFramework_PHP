<?php
include('connect.php');
include('./config/restriction.php');

// Comando para verificar usuário logado
if(!isset($_SESSION['login'])){
  header("location: login");
  exit;
}else{
 // echo "Bem vindo; $email";
}

$login = $_SESSION['login'];
$stmt = $conn->prepare("SELECT nome FROM users WHERE id = :id");
$stmt->bindParam(":id", $login);
$stmt->execute();
$login = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Informações do usuário logado -->
<p class="user"><?php echo $login['nome']; ?> | id: <?php echo $_SESSION['login']; ?></p>

<style>
    .user{
        font-size: 12px;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        float: right;
        padding: 10px;
    }
</style>

