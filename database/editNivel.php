<?php
// Conectar ao banco de dados
include('connect.php');
include('./config/restriction.php');
include('./config/nivel-adm.php');

// Campos para o filtro de pesquisa
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nivel = isset($_POST['nivel']) ? $_POST['nivel'] : null;

// Fazer a consulta no banco de dados através do search
$sql = "SELECT * FROM users WHERE email LIKE :email";
$stmt = $conn->prepare($sql);
$stmt->bindValue(":email", "%$email%");
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="./public/assets/MyFramework.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/myframework.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Usuários</title>
</head>
<body>
	<div id="resultado">
	<h1 class="text-edit-titulo">Usuários</h1>
	<table>
		
		<?php foreach ($resultado as $usuario): ?>
			<p class="text-edit">
			   ID: <?= $usuario['id'] ?> | 
				<?= $usuario['nome'] ?> | 
				<?= $usuario['email'] ?> | 
				<?= $usuario['nivel'] ?> 
				<!--<a href="editarNivel?id=<?= $usuario['id'] ?>">Editar</a>-->
		    </p>
			<hr>
		<?php endforeach ?>
	</table>
	<hr>
	<?php
	include('./views/pages/editarNivel.php');
	?>
	</div>
</body>
</html>

<style>
	#resultado{
		width: 84%;
		margin-left: 15%;
		padding: 20px;
	}
	.text-edit-titulo{
		font-size: 15px;
		font-family: Arial, Helvetica, sans-serif;
		padding: 10px;
	}
	.text-edit{
		font-size: 12px;
		font-family: Arial, Helvetica, sans-serif;
		padding: 10px;
		background-color: #D3D3D3;
	}
</style>
