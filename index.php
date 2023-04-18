<?php
// Rotas amigáveis com PHP

 // Retorna a página inicial do projeto
 $rota = explode("/", $_GET['url']  ?? 'inicio');

 // var_dump($rota);

 // Rota views
 if (file_exists("views/{$rota[0]}.php")){
    include "views/{$rota[0]}.php";
 }

 // Rota views/pages
 if (file_exists("views/pages/{$rota[0]}.php")){
   include "views/pages/{$rota[0]}.php";
}

  // Rota views/auth
  if (file_exists("views/auth/{$rota[0]}.php")){
   include "views/auth/{$rota[0]}.php";
}

  // Rota config
  if (file_exists("config/{$rota[0]}.php")){
   include "config/{$rota[0]}.php";
}

  // Rota errors
  if (file_exists("errors/{$rota[0]}.php")){
   include "errors/{$rota[0]}.php";
}

  // Rota database
  if (file_exists("database/{$rota[0]}.php")){
   include "database/{$rota[0]}.php";
}


?>