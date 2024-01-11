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
                    <form action="#" method="post">
                    <label for="nome" id="nome">Nome </label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome Completo.">
                    <label for="email" id ="email">Usuário</label>
                    <input type="text" name="email" id="email"placeholder="Nome usado para efetuar o login.">
                    <label for="email" id ="email">Email</label>
                    <input type="email" name="email" id="email"placeholder="Seu Email para Contato.">
                    <label for="email" id ="email">Endereço</label>
                    <input type="text" name="email" id="email" placeholder="Seu Endereço Residêncial.">
                    <label for="number" id="number">Número de contato</label>
                    <input type="tel" name="tel" id="number" placeholder="(99) 99999-9999.">
                    <label for="email" id ="email">Senha</label>
                    <input type="password" name="email" id="email">
                    <label for="email" id ="email">Confirme sua senha</label>
                    <input type="password" name="email" id="email">
                    <div class="termo">
                    <input class="radio" type="radio" name="email" id="email">
                    <label  for="number" id="number">aceito e concordo com as politicas de privacidade do usuário.</label>
                    </div>
                    <input class="btn" type="button" value="Enviar">
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