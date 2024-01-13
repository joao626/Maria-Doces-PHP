<?php 

include '../includes/header.php';

?>

        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">
                    <h1>Formulário para Cadastro </h1>
                    <h2>Entre em contato conosco para tirar dúvidas, dar um feedback ou elogiar nossa equipe e nossas gostosuras. </h2>
                    
                    <form action="../config/action_register.php" method="POST">
                    
                    <label for="nome" id="nome">Nome </label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome Completo.">

                    <label for="nickname" id ="nickname">Usuário</label>
                    <input type="text" name="nickname" id="nickname"placeholder="Nome usado para efetuar o login.">
                    
                    <label for="email" id ="email">Email</label>
                    <input type="email" name="email" id="email"placeholder="Seu Email para Contato.">
                    
                    <label for="endereco" id ="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" placeholder="Seu Endereço Residêncial.">
                    <!-- aumenta o endereco ai jao -->
                    
                    <label for="telefone" id="telefone">Número de contato</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="(99) 99999-9999.">
                    
                    <label for="senha" id ="senha">Senha</label>
                    <input type="password" name="senha" placeholder="senha" id="password">
                    
                    <label for="confirmesenha" id ="senha">Confirme sua senha</label>
                    <input type="password" name="confirmesenha" placeholder="confirme sua senha" id="confirm_password">
                    
                    <div class="termo">
                    <input class="radio" type="radio" name="termo" id="termo">
                    <label  for="termo" id="termo">aceito e concordo com as politicas de privacidade do usuário.</label>
                    </div>
            
                    <input class="btn" type="submit" name="enviar" value="Enviar">
                    
                    </form>
                  
                    <div class="paralax-direito"></div>
                  </div>
              </div>
            <div class="paralax-direito"></div>
        </div>
        
        <script>
            var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Senhas diferentes!");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>

    </main>
  
<?php

include '../includes/footer.php';

?>