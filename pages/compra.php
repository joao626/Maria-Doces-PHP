<?php 

include '../includes/header.php';

?>


        <div class = "container">
            <div class ="paralax-esquerda">
            </div>
            <div class="content fundo">
                <div class="content conteudo">
                    <h1>Compras</h1>
                <div class="cards">
                    <div class="card">
                        <img class="ft-produto" src="../assets/img/pexels-anastasia-belousova-3522562.jpg" class="card-img-top" alt="Biscoitos Natalinos">
                        <div class="card-body">
                          <h5 class="card-title">Biscoitos Natalinos</h5>
                          <p class="card-text">Deliciosos Biscoitos de chocolate com decorações açucaradas.</p>
                          <a href="#" class="btn ">Comprar</a>
                          <h2 class="card-title2">R$ 2,00</h2>
                          
<form>
    <label class="tipo" for="tipo">Tipo</label>
    <select id="tipo" name="tipo">
        <option value="">Escolha uma opção</option>
        <option value="normal">Normal</option>
        <option value="diet">Diet (para diabéticos)</option>
    </select>

    <br>

    <label class="sabor" for="sabor">Sabor</label>
    <select id="sabor" name="sabor">
        <option value="">Escolha uma opção</option>
        <option value="chocolate">Chocolate</option>
        <option value="baunilha">Baunilha</option>
    </select>

    <label class="pagamento" for="pay">Pagamento</label>
    <select id="pay" name="pay">
        <option value="">Escolha uma opção</option>
        <option value="Dinheiro">Dinheiro</option>
        <option value="Pix">Pix</option>
        <option value="Crédito">Cartão de Crédito</option>
        <option value="Debito">Cartão de Debito</option>
    </select>

    <label class="uni" for="quantidade">Unidades</label>
    <input type="text" value=1 id="quantidade" name="quantidade" min="1" placeholder="Digite a quantidade"  required inputmode="numeric">
    
    <button class="ad" type="button" onclick="aumentarQuantidade()">+</button>
    <button class="rt" type="button" onclick="diminuirQuantidade()">-</button>

</form>

<script>
    function aumentarQuantidade() {
        var quantidadeInput = document.getElementById('quantidade');
        quantidadeInput.value = parseInt(quantidadeInput.value, 10) + 1;
        atualizarValor();
    }

    function diminuirQuantidade() {
        var quantidadeInput = document.getElementById('quantidade');
        var novaQuantidade = parseInt(quantidadeInput.value, 10) - 1;
        quantidadeInput.value = novaQuantidade >= 1 ? novaQuantidade : 1;
        atualizarValor();
    }

    function atualizarValor() {
        var quantidadeInput = document.getElementById('quantidade');
        var valor = quantidadeInput.value;
        var valorAtualizadoElemento = document.querySelector('.card-title2');
        
        var novoValor = 2 * valor; 
        valorAtualizadoElemento.textContent = 'R$ ' + novoValor.toFixed(2);
    }
</script>
</form>
                        </div>
                    </div> 
            </div>
          </div>
        </div>
        <div class="paralax-direito"></div>
        
    </main>  
<?php

include '../includes/footer.php';

?>