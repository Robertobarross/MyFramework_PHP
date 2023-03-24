<div> 
    <form action="/PROJETOS_PHP/MyFramework/views/auth/register.php" method="POST" enctype="multipart/form-data">
        
        <p><input type="text" name="nome" class="campos-form" placeholder="Cadastrar nome do usuário" required></p>
        
        <p><input type="email" name="email" class="campos-form" placeholder="Cadastrar e-mail" required></p>
        
        <p><input type="password" name="senha" class="campos-form" placeholder="Cadastrar senha com no máximo 8 caracteres" maxlength="8"></p>

        <p><input type="password" name="repeteSenha" class="campos-form" placeholder="Cadastrar senha com no máximo 8 caracteres" maxlength="8"></p>

        <p><button type="submit" value="cadastrar" class="btn">Cadastrar</button>
        <input type="reset" value="limpar" class="btn"></p>
    </form>
</div>