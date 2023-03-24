<?php
// Rotas amigáveis com PHP

 // Retorna a página inicial do projeto
 $rota = explode("/", $_GET['url']  ?? 'welcome');

 // var_dump($rota);

 // Chama todas as página com arquivo .html
 if (file_exists("views/{$rota[0]}.html")){
    include "views/{$rota[0]}.html";
 }
 
 // Chama todos os arquivos .php
 if (file_exists("config/{$rota[0]}.php")){
    include "config/{$rota[0]}.php";
 }

?>