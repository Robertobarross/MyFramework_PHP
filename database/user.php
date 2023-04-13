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
$stmt = $conn->prepare("SELECT nome, email, id FROM users WHERE id = :id");
$stmt->bindParam(":id", $login);
$stmt->execute();
$login = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div id="perfil">
<p class="nome">Perfil |
<?php echo $login['nome']; ?></p>
</div>

<div id="dados">
<p class="dados-user"><?php echo "id: "; echo $_SESSION['login']; ?></p>
<p class="dados-user">Email | <?php echo $login['email']; ?></p>
<hr>
<p>
  <a href="#" class="dados-user">Trocar senha</a> |
  <a href="dashboard" class="dados-user">Dashboard</a> |
  <a href="logout" class="dados-user">Sair</a>
</p>
<hr>
</div>


<form method="post" action="editSenha">
    <input type="text" name="id" value="<?php echo $login['id']; ?>">
    <label for="nova_senha">Nova senha:</label>
    <input type="password" name="nova_senha" id="nova_senha">
    <input type="submit" value="Alterar senha">
</form>







<style>
  #perfil{
    width: 100%;
    height: 40px;
    padding: 8px;
    background-color: #363636;
  }
  .nome{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    float: right;
    margin-right: 10px;
    color: white;
  }
  #dados{
    width: 100%;
    height: auto;
    padding: 20px;
  }
  .dados-user{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    text-align: justify;
  }
</style>

