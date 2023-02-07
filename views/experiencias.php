<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/agitos_slz/templates/cabecalho.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/agitos_slz/models/experiencias.php';

try {
  $lista = Experiencia::listar();
} catch (Exception $e) {
  echo $e->getMessage();
}


/* comentei acima os requires necessarios do back end e a geracao da lista...
abaixo eu gero a lista vazia para ele passar na verificacao enquanto ainda estamos no front end */

//$lista = [];
?>

<!-- ajuste no layout da pagina -->
<style>
    body{ font: 15px sans-serif; }
    .wrapper{ width: 660px; padding: 120px; }
</style>

<!--?php if (count($lista) > 0) : ?-- >
  <section-->
    <!-- o codigo da equipe aqui dentro -->
    <!-- Experiencias -->
    <!-- container do carrossel -->
    <div class="container-carrossel">
        <!-- container dos slides -->
        <div class="slideshow-container">
            <?php foreach ($lista as $imagem) : ?>
                <!-- imagens com largura maxima com numero e texto de legenda -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($imagem['imagem_post']); ?>" style="width: 100%;" />
                </div>
            <?php endforeach; ?>

            <!-- botoes "proximo" e "anterior" -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- os circulos -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>


    <div class="container marketing" style="text-align:center ">

        <!-- Mostra os titulos das postagens nos cards -->
        <div class="row">

            <?php foreach ($lista as $list_cont) : ?>
                <div class="col-lg-4">
                    <!-- o link é redirecionado identificando o id do conteudo  -->
                    <a href="/agitos_slz/views/exp_postagens.php?id_conteudo=<?= $list_cont['id_conteudo'] ?>">
                        <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($list_cont['imagem_post']); ?>" style="width: 10rem; height: 10rem; " class="bd-placeholder-img rounded-circle"/>
                        <h2><?= $list_cont['titulo'] ?></h2>
                        <p><?= $list_cont['conteudo'] ?></p>
                        <p><button>Veja agora</button></p>
                    </a>
                </div>
            <?php endforeach; ?>

            <br><br>
            
            <!-- link para retornar para o index para debug -->
            <a href="index.php" class="btn btn-danger ml-3" style="position:absolute; top:10px; ">Home</a>
            
        </div>
        <br><br>
        <!-- script que roda o carrossel da pag experiencias -->
        <script src="../js/exp_carrossel.js"></script>
    </div>
  
  <!--/section>
< !--?php else : ?>
  <section>
    Ainda não há experiencias cadastradas
  </section>
< ?php endif; ?-->

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/agitos_slz/templates/rodape.php';
?>