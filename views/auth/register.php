<?php
// Arquivo da conexão com o bd
include "./database/connect.php";

// Declarando variáveis do cadastro
@$foto = $_FILES['foto']['name'];
@$tipo = $_FILES['foto']['type'];
@$usuario = $_POST['usuario'];
@$email = $_POST['email'];
@$password = $_POST['password'];
@$repetepassword = $_POST['repetepassword'];
@$nivel = $_POST['nivel'];

$cadastro = false; // Para que os campos sejam preenchidos
if($foto != "" && $usuario != "" && $email != "" && $password != "" && $repetepassword != "" && $nivel != "")

// Confima se password é igual a repetepassword
if($password != $repetepassword) {
    echo "<script>alert('Senha não é igual');window.history.go(-1)</script>";
}else {
    echo $registro = true; // Se as senhas estiverem corretas o registro é validado 
    header('location:'); // Permanecer na página de cadstro
}

// Insere as informações na tabela do bd 
@mysqli_query($link,"INSERT INTO tb_adm(foto,usuario,email,password,repetepassword,nivel)VALUES('$foto','$usuario','$email','$password','$repetepassword','$nivel')");

?>

$host = 'localhost';
$dbname = 'seu_banco_de_dados';
$user = 'seu_usuario';
$password = 'sua_senha';

try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";

$stmt = $conn->prepare($sql);

$nome = 'Fulano';
$email = 'fulano@email.com';
$senha = 'senha123';

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);

try {
  $stmt->execute();
  echo 'Usuário cadastrado com sucesso!';
} catch(PDOException $e) {
  echo 'Erro ao cadastrar usuário: ' . $e->getMessage();
}
