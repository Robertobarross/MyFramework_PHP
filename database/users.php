<?php
// Retorna todos os registros do banco de dados
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

?>