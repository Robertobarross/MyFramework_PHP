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

   // Insere as informção no BD
   $stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)");

   // Declarando variáveis
   @$stmt->bindParam(':nome', $nome);
   @$stmt->bindParam(':email', $email);
   @$stmt->bindParam(':senha', $senha);

   // Verifica se as senhas são iguais
   @$repeteSenha = $_POST['repeteSenha'];
   if ($_POST['senha'] != $_POST['repeteSenha']) {
    echo "<div style='background-color: red; 
    text-align: center; 
    font-size: 18px; 
    color: white; 
    font-family: Arial;
    height: 10%;
    padding: 20px; '>
                As senhas que você digitou não são iguais!
                <br>
                Retornar | 
                <a href='register'>
                Register
              </a>
            </div>"; 
     exit();
   }

   // Verifica se o cadastro deu certo
   if ($stmt->execute()) {
        echo "<div class='login'>
                Usuário $nome cadastrado com sucesso!
                <br>
                Fazer | 
                <a href='login'>
                Login
                </a>
            </div>"; 
   } else {
       echo "<div class='erro'>
                  Erro! O email: $email já existe na nossa base de dados.
                  <br>
                  Retornar | 
                  <a href='register'>
                  Register
               </a>
            </div>";   
}
?>

<style type="text/css">
    .erro{
        margin: 0;
        width: 97%;
        height: 10%;
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: red;
        color: white;
        text-align: center;
        padding: 20px;
    }
    .login{
        margin: 0;
        width: 97%;
        height: 10%;
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        background-color: green;
        color: white;
        text-align: center;
        padding: 20px;
    }
</style>