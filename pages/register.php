<?php 

include '../includes/header.php';

?>


        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- api de cep -->
        

        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">
                    <h1>Formulário para Cadastro </h1>
                    <h2>Entre em contato conosco para tirar dúvidas, dar um feedback ou elogiar nossa equipe e nossas gostosuras. </h2>
                    
                    <form action="../config/action_register.php" method="POST">
                    
                    <label for="nome" id="nome">Nome </label>
                    <input type="text" name="nome" id="nome" placeholder="Seu Nome Completo." required>

                    <label for="nickname" id ="nickname">Usuário</label>
                    <input type="text" name="nickname" id="nickname"placeholder="Nome usado para efetuar o login." required>
                    
                    <label for="email" id ="email">Email</label>
                    <input type="email" name="email" id="email"placeholder="Seu Email para Contato." required>
                    
                    <label for="endereco" id ="endereco"> ===== Área de Endereço ===== </label>
    
                    <label for="cep">Cep</label>
                    <input type="text" name="cep" id="cep" placeholder="00000-000"> 

                    <label for="bairro" id ="bairro">Bairro</label>
                    <input type="text" name="bairro" id="neighborhood" placeholder="Bairro">

                    <label for="rua" id ="rua">Rua</label>
                    <input type="text" name="rua" id="street" placeholder="Rua">

                    <label for="numero" id ="numero">Número</label>
                    <input type="number" name="numero" id="numero" placeholder="Digite o número da sua casa">

                    <label for="cidade" id ="cidade">Cidade</label>
                    <input type="text" name="cidade" id="city" placeholder="Cidade">

                    <label for="uf" id ="uf">UF</label>
                    <input type="text" name="uf" id="state" placeholder="UF do estado. Ex: RJ">

                    <label for="telefone" id="telefone">Número de contato</label>
                    <input type="tel" name="telefone" id="telefone" placeholder="(99) 99999-9999." required><br>
                    
                    <label for="senha" id ="senha">Senha</label>
                    <input type="password" name="senha" placeholder="senha" id="password" required>
                    
                    <label for="confirmesenha" id ="senha">Confirme sua senha</label>
                    <input type="password" name="confirmesenha" placeholder="confirme sua senha" id="confirm_password" required>
                    
                    <div class="termo">
                    <input class="radio" type="radio" name="termo" id="termo" required>
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



    <script>

        window.onload = () => {
            const cepInput = document.getElementById('cep');
            cepInput.addEventListener('keyup', async (event) => {
                var cep = cepInput.value.replace(/([.-])/g, '');


                if(cep.length == 8) {

                    const data = await findCEP(cep);

                    if(data.erro){
                        cepInput.style.border = '1px solid #a53c3c';
                    } else {
                        cepInput.style.border = '1px solid #ccc';
                        document.getElementById('neighborhood').value = data.bairro || '...';
                        document.getElementById('street').value = data.logradouro || '...';
                        document.getElementById('city').value = data.localidade || '...';
                        document.getElementById('state').value = data.uf || '...';
                    }
                } else {
                    cepInput.style.border = '1px solid #ccc';
                    document.getElementById('neighborhood').value = '';
                    document.getElementById('street').value = '';
                    document.getElementById('city').value = '';
                    document.getElementById('state').value = '';
                }

                if(cep.length > 8) {
                    cepInput.style.border = '1px solid #a53c3c';
                }

            });

        }

        async function findCEP(cep) {
            
            const response = await axios.get(`https://viacep.com.br/ws/${cep}/json/`);
            const data = response.data;

            return data;
        }

    </script>

    </main>
  
<?php

include '../includes/footer.php';

?>
