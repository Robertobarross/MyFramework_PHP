<?php
include('connect.php');
include('./config/restriction.php');

// echo "id: "; echo $_SESSION['login']; // Usuário logado

if(!isset($_SESSION['login'])){
  header("location: login");
  exit;
}else{
 // echo "Bem vindo; $email";
}

// Faz a consulta no banco de dados
$login = $_SESSION['login'];
$stmt = $conn->prepare("SELECT nome, email, id, data_cadastro FROM users WHERE id = :id");
$stmt->bindParam(":id", $login);
$stmt->execute();
$login = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!-- Id e email do usuário lagodo -->
<div id="dados">
<p class="dados-user">PERFIL</p>
<p class="dados-user"><?php echo "Nome | "; echo $login['nome']; ?></p>
<p class="dados-user">Email | <?php echo $login['email']; ?></p>
<p class="dados-user">Cadastro | <?php echo $login['data_cadastro']; ?></p>
<hr>

<!-- Edita senha do usuário lagodo -->
<form method="post" action="editSenha">
    <p class="dados-user">Alterar senha | id:
    <input type="text" class="id-user" name="id" value="<?php echo $login['id']; ?>" readonly>
    </p>
    <p class="dados-user">
    <input type="password" name="nova_senha" id="nova_senha" class="dados-user" placeholder="Nova senha" maxlength="8" minlength="6">
    </p>
    <p class="dados-user">
    <input type="password" name="repetir_senha" id="repetir_senha" class="dados-user" placeholder="Repetir senha" maxlength="8" minlength="6">
    </p>
    <input type="submit" value="Alterar senha" class="btn">
</form>
<hr>
</div>

<!-- Estilização -->
<style>
  #dados{
    width: 85%;
    height: auto;
    padding: 20px;
    float: right;
  }
  .dados-user{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: justify;
    color: #808080;
  }
  .btn{
    width: 200px;
    border: 1px solid #363636;
    text-align: center;
    background-color: #363636;
    color: white;
  }
  .id-user{
    border: none;
    width: 50%;
    color: #808080;
  }
</style>

