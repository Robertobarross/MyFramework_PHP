<?php
include('./config/restriction.php'); // Só permite usuário logado
?>

    <!-- Topo template -->
    <div id="topo-template">
        <?php
          include('./database/userLogado.php');
        ?>
    </div> 

    <!-- Nav lateral template -->
    <div id="nav-lateral-template">
        <img src="./public/assets/MyFramework.png" alt="Logomarca" class="logo">
        <br>
        <br>
        <a href="painel" class="links-nav-lateral">Painel</a>  
        <hr class="hr-template">
        <a href="profile" class="links-nav-lateral">Perfil</a>  
        <br>
        <hr class="hr-template">
        <a href="inicio" class="links-nav-lateral">Início</a>  
        <hr class="hr-template">
        <a href="logout" class="links-nav-lateral">Sair</a>  
        <hr class="hr-template">
    </div>