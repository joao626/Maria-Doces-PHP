<?php 

include '../includes/header.php';

?>

        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">
                    <h1>Formulário para Contato</h1>
                    <h2>Entre em contato conosco para tirar dúvidas, dar um feedback ou elogiar nossa equipe e nossas gostosuras. </h2>
                    <form action="#" method="post">
                    <label for="nome" id="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome Completo.">
                    <label for="email" id ="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Seu Email para Contato.">
                    <label for="number" id="number">Número para contato</label>
                    <input type="tel" name="tel" id="number" placeholder="(99) 99999-9999.">
                    <label for="assunto" id="assunto">Assunto</label>
                    <input type="text" name="assunto" id="assunto"placeholder="Motivo do Contato.">
                    <label for="feedback">Envie seu feedback</label>
                    <textarea name="feedback" id="feed" cols="30" rows="10" placeholder="Dê sua opinião aqui."></textarea>
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