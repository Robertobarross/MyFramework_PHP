<?php
   include('./config/restriction.php');
   // Conexão com banco de dados
   $dsn = 'mysql:host=localhost;dbname=db_myframework_php';
   $username = 'root';
   $password = '';

   $conn = new PDO($dsn, $username, $password);
?>