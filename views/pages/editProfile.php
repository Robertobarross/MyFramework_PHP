<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Editar Perfil</h1>

    <table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
  </tr>
  <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['nome']; ?></td>
      <td><?php echo $row['email']; ?></td>
    </tr>
  <?php } ?>
</table>

<?php
$host = "nome_do_host"; // Endereço do servidor
$dbname = "nome_do_banco"; // Nome do banco de dados
$user = "nome_do_usuario"; // Nome do usuário
$password = "senha_do_usuario"; // Senha do usuário

// Cria uma conexão com o banco de dados utilizando PDO
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$sql = "SELECT id, nome, email FROM usuarios";
$stmt = $pdo->query($sql);

?>






</body>
</html>