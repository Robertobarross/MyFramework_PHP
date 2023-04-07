<?php
//session_start();

// Conexão com banco de dados
/*
$dsn = 'mysql:host=localhost;dbname=db_myframework_php';
$username = 'root';
$password = '';

$conn = new PDO($dsn, $username, $password);
*/

include('connect.php');
include('./config/restriction.php');

// Suponha que o ID do usuário logado seja armazenado na variável $user_id
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);



$select = $conn->query("SELECT * FROM users WHERE id");
$data = $select->fetchAll();
foreach ($data as $row){
        echo '<tr class="text-center">';
        echo '<td>'.$row["nome"].'</td>';
        echo '<td>'.$row["email"].'</td>';
        echo '<td><a href="profile.php?link=3&id='.$row["id"].'" class="btn btn-primary">'.'EDITAR'.'</a> <a href="profile.php?link=4&id='.$row["id"].'" class="btn btn-danger">'.'DELETAR'.'</a> </td>';
        echo '</tr>';
}








/*
try {
    $pdo = new PDO('mysql:host=localhost;dbname=db_myframework_php', 'root', '');
  } catch (PDOException $e) {
    die('Erro de conexão: ' . $e->getMessage());
  }
  
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  
  $stmt = $pdo->prepare('UPDATE users SET nome = :nome, email = :email WHERE id = :id');
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  
  if ($stmt) {
    //header('Location: confirmacao.php');
  } else {
    echo 'Erro ao atualizar usuário.';
  }

  echo $nome;
  */


  
// Connect to the database using PDO
/*
$dsn = 'mysql:host=localhost;dbname=db_myframework_php';
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
$dbh = new PDO($dsn, $username, $password, $options);

// Retrieve the logged-in user's information from the database
@$user_id = $_SESSION['user_id']; // assume user ID is stored in session
$stmt = $dbh->prepare("SELECT * FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Display the user's information in an HTML form
echo '<form action="update.php" method="post">';
echo '<input type="text" name="nome" value="' . $user['nome'] . '">';
echo '<input type="text" name="email" value="' . $user['email'] . '">';
echo '<input type="submit" value="Update">';
echo '</form>';

// When the user submits the form, retrieve the updated information from the form fields
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];

    // Use PDO to update the user's information in the database
    $stmt = $dbh->prepare("UPDATE users SET nome = :nome, email = :email WHERE id = :user_id");
    $stmt->bindParam(':name', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    echo 'User information updated.';
}
*/
?>
