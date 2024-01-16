<?php

include '../includes/header.php';

?>

  <div class="container">
    <div class="paralax-esquerda">
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../assets/img/bolo.png" class="d-block w-100" alt="...">
          <div class="carousel-caption">
                <button id="botaoDoSlide" class="btn-carrousel">Veja Mais em Nosso Catálogo.</button>
            </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/mike-meeks-zk-fclJdGas-unsplash.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
                <button id="botaoDoSlide" class="btn-carrousel">Veja Mais em Nosso Catálogo.</button>
            </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/pexels-leonardo-luz-17345361.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
                <button id="botaoDoSlide" class="btn-carrousel">Veja Mais em Nosso Catálogo.</button>
            </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/elena-leya-2mOHx9MIqb8-unsplash.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
                <button id="botaoDoSlide" class="btn-carrousel">Veja Mais em Nosso Catálogo.</button>
            </div>
        </div>
        <div class="carousel-item">
          <img src="../assets/img/american-heritage-chocolate-TZFshUFzWRQ-unsplash.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
                <button id="botaoDoSlide" class="btn-carrousel">Veja Mais em Nosso Catálogo.</button>
            </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
      </button>
    </div>
    <div class="paralax-direito"></div>
  </div>
</main>
<script>
        // Adicione um evento de clique ao botão
        document.getElementById('botaoDoSlide').addEventListener('click', function() {
            // Redirecione para a página desejada
            window.location.href = 'products.php';
        });
    </script>

<?php

include '../includes/footer.php';

?>
