<?php
    // Encerrar a sessão
    session_start(); // Inicia a sessão
    session_unset(); // Apaga dados da sessão
    session_destroy(); // Encerra a sessão
    header("location: welcome"); // Ao encerrar retorna para página inicial
?>