<?php
  include_once './includes/partials/header.php';
 include_once '../includes/functions/function.php';
?>
<?php
  include_once './includes/partials/nav.php';
?>
<main class="">
        <section class="sec1">
            <div class="sec1-ban">
                <h3>
                    1. Browse
                </h3>
                <p>
                    Browse our books collection online and add them
                    to your own personnal queue list.
                </p>
            </div>

            <div class="rated-books-ctn">
                <div class="sec-title">
                    <span class="title-wrap">
                        <h4 class="text-red">Fantastique</h4>
                    </span>
                    <div></div>
                </div>

                <div class="shelft-ctn">
                    <div class="shelft-carousel">
                        <div class="shelft-carousel-view">
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                        </div>
                        <button class="more-btn prev" type="button">
                                     &#8592; Précédent
                        </button>
                        <button class="more-btn next" type="button">
                                     Suivant &#8594;
                        </button>
                    </div>
                    <img src="./assets/img/Sw2.PNG" class="shelft-img" alt="">
                </div>

                <button class="more-btn ml-auto" type="button">
                    Plus →
                </button>
            </div>

            <div class="arrivals-ctn">

                <div class="sec-title">
                    <h4 class="text-red">Littérature</h4>
                    <div></div>
                </div>

                <div class="shelft-ctn">
                    <div class="shelft-carousel">
                        <div class="shelft-carousel-view">
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                            <div class="shelft-item">
                                <img src="./assets/img/book.jpeg" alt="">
                            </div>
                        </div>
                        <button class="more-btn prev" type="button">
                                     &#8592; Précédent
                        </button>
                        <button class="more-btn next" type="button">
                                     Suivant &#8594;
                        </button>
                    </div>
                    <img src="./assets/img/Sw2.PNG" class="shelft-img" />
                </div>

                <button class="more-btn ml-auto" type="button">
                    Plus →
                </button>
            </div>
        </section>
        <?php
          include_once './includes/partials/cate_search_bar.php';
        ?>
</main>



<?php
  include_once './includes/partials/footer.php';
?>
