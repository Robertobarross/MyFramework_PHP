<?php
// Retorna todos os registros do banco de dados
/*
$dsn = 'mysql:host=localhost;dbname=db_myframework_php';
$username = 'root';
$password = '';

$conn = new PDO($dsn, $username, $password);
*/

include('connect.php');

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

?>