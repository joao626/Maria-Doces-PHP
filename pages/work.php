<?php 

include '../includes/header.php';

?>

        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">
                    <h1>Trabalhe Conosco</h1>
                    <h2>Venha e seja o nosso colaborador , faça parte dessa família que só cresce.</h2>
                    <form action="#" method="post">
                    <label for="nome" id="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome Completo.">
                    <label for="email" id ="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Seu Email para Contato.">
                    <label for="number" id="number">Número para contato</label>
                    <input type="tel" name="tel" id="number" placeholder="(99)99999-9999.">
                    <label for="assunto" id="assunto">Área de Interesse</label>
                    <input type="text" name="assunto" id="assunto" placeholder="Área de Atuação.">
                    <label for="feedback">Envie seu Currículo</label>
                    <input class="file" type="file" id="arquivo" name="arquivo" accept=".pdf, .doc, .docx">
                    <input class="btn" type="submit" value="Enviar CV">
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