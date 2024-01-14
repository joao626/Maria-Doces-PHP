<?php 

include '../includes/header.php';

?>


        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">

                    <h1>Login</h1>
                    <h2>Entre em sua conta para ter acesso a nossa loja online e para fazer encomendas dos nossos produtos!</h2>
                   
                    <form action="../config/action_login.php" method="post">

                    <label for="user" id="user">Usuário ou email</label>
                    <input type="text" name="user" id="user" required>
                    
                    <label for="password" id ="password">Senha</label>
                    <input type="password" name="password" id="password" required>
                    
                    <a class = "link-recup" href="../config/esqueci_minha_senha.php">Esqueci minha senha !</a>
                    <input class="btn" name="entrar" type="submit" value="Entrar" required>
                    
                    </form>
                  
                    <div class="paralax-direito"></div>

                  </div>
              </div>
            <div class="paralax-direito"></div>
        </div>
        
    </main>

<?php

include '../includes/footer.php';

?>