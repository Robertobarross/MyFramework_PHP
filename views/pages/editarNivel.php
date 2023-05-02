<?php
// Conectar ao banco de dados
include('./database/connect.php');
include('./config/nivel-adm.php');

// Recebe os dados do formulário
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$user_nivel = isset($_POST['user_nivel']) ? $_POST['user_nivel'] : null;

// Atualiza o nível do usuário no banco de dados
$sql = "UPDATE users SET nivel = :user_nivel WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_nivel' => $user_nivel, 'user_id' => $user_id]);

// Verifica se a atualização foi realizada com sucesso
if ($stmt->rowCount() > 0) {
      session_start();
        $_SESSION['msg-nivel'] = "<div class='msg-sucesso'>
         O nível do usuário foi atualizado com sucesso! 
        </div>";
      header('location: users');
      exit();
} else {
  //echo "Negado";
    echo "<p class='nivel-erro'>
    Erro ao atualizar o nível do usuário, o ID que você informou não existe na nossa base de dados!.
    <a href='users'>RETRONAR</a></p>";
   // unset($_SESSION['msg-erro']);
    //header('location: users');
    //exit();
} 
?>

<form method="post" action="editarNivel">
  <label class="text-edit-nivel">Para alterar o nível de acesso, confirme a baixo o ID do usuário que deseja alterar:</label>
  <br>
  <input type="number" id="user_id" name="user_id" class="text-edit-nivel" placeholder="Digite aqui o ID" required>

  <br>
  <br>
  <label class="text-edit-nivel">Nível:</label>
  <select id="user_nivel" name="user_nivel">
  <option value="admin" class="text-edit-nivel"></option>
    <option value="admin" class="text-edit-nivel">Admin</option>
    <option value="vendedor" class="text-edit-nivel">Vendedor</option>
    <option value="usuario" class="text-edit-nivel">Usuário</option>
  </select>

  <button type="submit" class="btn-editar-nivel">Alterar</button>
</form>

<style>
  .text-edit-nivel{
    font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
    padding: 0px;
  }
  .btn-editar-nivel{
    font-size: 12px;
    font-family: Arial, Helvetica, sans-serif;
    border: none;
    background-color: #4F4F4F;
    color: #F8F8FF;
    padding: 8px;
  }
  .nivel-erro{
    width: 100%;
    background-color: red;
    color: white;
    padding: 10px;
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
  }

</style>
