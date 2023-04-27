<?php
   // Conexão com o banco de dados
  @include('./database/connect.php');

  // Conexão com o banco de dados
  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
    echo 'Erro ao conectar com o banco de dados: ' . $e->getMessage();
}

   // Variávei da formulário login
   @$nome = $_POST['nome'];
   @$email = $_POST['email'];
   @$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
   @$data_cadastro = $_POST['data_cadastro'];

   // Insere as informção no BD
   $stmt = $conn->prepare("INSERT INTO users (nome, email, senha, data_cadastro) VALUES (:nome, :email, :senha, :data_cadastro)");

   // Declarando variáveis
   @$stmt->bindParam(':nome', $nome);
   @$stmt->bindParam(':email', $email);
   @$stmt->bindParam(':senha', $senha);
   @$stmt->bindParam(':data_cadastro', $data_cadastro);

   // Verifica se as senhas são iguais
   @$repeteSenha = $_POST['repeteSenha'];
   if ($_POST['senha'] != $_POST['repeteSenha']) {
        session_start();
        $_SESSION['msg-senha'] = "<div class='msg-negado'>
        As senha que você digitou não são iguais!
        </div>";
        header('location: register');
       // exit();
   }
   // Verifica se o cadastro deu certo
   if ($stmt->execute()) {
        session_start();
        $_SESSION['msg-cadastro'] = "<div class='msg-sucesso'>
        $nome cadastrado com sucesso!
        </div>";
        header('location: register');
       // exit();
   // Verifica se o email já é cadastrado     
   } else {
        session_start();
        $_SESSION['msg-email'] = "<div class='msg-negado'>
        O email $email já existe na nossa base de dados!
        </div>";
        header('location: register');
       // exit();
}
?>

<style type="text/css">
    .msg-negado{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    background-color: red;
    color: #F8F8FF;
}
.msg-sucesso{
    font-size: 15px;
    font-family: Arial, Helvetica, sans-serif;
    width: 100%;
    background-color: green;
    color: #F8F8FF;
}
</style>