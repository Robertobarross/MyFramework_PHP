<?php
// Rotas amigáveis com PHP

 // Retorna a página inicial do projeto
 $rota = explode("/", $_GET['url']  ?? 'welcome');

 // var_dump($rota);

 // Rota views
 if (file_exists("views/{$rota[0]}.php")){
    include "views/{$rota[0]}.php";
 }

 // Chamada da rota views/pages
 if (file_exists("views/pages/{$rota[0]}.php")){
    include "views/pages/{$rota[0]}.php";
 }

 // Chamada da rota views/auth
 //if (file_exists("views/auth/{$rota[0]}.php")){
  // include "views/auth/{$rota[0]}.php";
//}

 // Chamada da rota errors
 if (file_exists("errors/{$rota[0]}.php")){
   include "errors/{$rota[0]}.php";
}

 // Chama todos os arquivos .php
 if (file_exists("config/{$rota[0]}.php")){
   include "config/{$rota[0]}.php";
}

// Chamada da rota database
if (file_exists("database/{$rota[0]}.php")){
   include "database/{$rota[0]}.php";
}

// Chamada da rota migrations
if (file_exists("migrations/{$rota[0]}.php")){
   include "migrations/{$rota[0]}.php";
}

// ---------------------------------------------------

// Chamada da rota public/assets/
if (file_exists("public/assets/{$rota[0]}.png")){
   include "public/assets/{$rota[0]}.png";
}

// Chamada da rota public/css/
if (file_exists("public/css/{$rota[0]}.css")){
   include "public/css/{$rota[0]}.css";
}

// Chamada da rota public/imgs/
if (file_exists("public/imgs/{$rota[0]}.png")){
   include "public/imgs/{$rota[0]}.png";
}

// Chamada da rota public/js/
if (file_exists("public/js/{$rota[0]}.js")){
   include "public/js/{$rota[0]}.js";
}

?>