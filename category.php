<?php include('views/html-includes/header.php'); ?>


<!-- ==================================== SIDE NAV ================================= -->
<?php require 'views/side-nav.php'; ?>
<!-- ==================================== SIDE NAV ================================= -->


<!-- =============================================== NAVBAR========================================== -->
<?php require 'views/navbar.php'; ?>
<!-- =============================================== NAVBAR END========================================== -->

<div id="blur">

    <!-- ==================================== CATEGORIES ================================= -->
    <?php require 'views/kategorije.php'; ?>
    <!-- ==================================== CATEGORIES END ================================= -->


    <!-- ==================================== SWIPER - NEWS ================================= -->
    <?php require 'views/swiper.php'; ?>
    <!-- ==================================== SWIPER - NEWS END ================================= -->



    <!-- ==================================== RIGHT LEFT SIDE  ================================= -->
    <div class="news-side container">
        <div class="row row-big d-flex">
            <div class="col-lg-6 m-2 bigger gray">

                <div class="row row-cat">
                    <?php foreach ($category->getPostCategory() as  $postCat) : ?>
                        <?php if ($postCat['status'] === 'objavljeno') : ?>
                            <div class="col-lg-6 my-3 d-flex">


                                <div style="width: 100%;height:100%;" class="news m-2 white">
                                    <div class="pt-1 img">
                                        <img src="./admin/pages/<?php echo $postCat['slika']; ?>" alt="">
                                    </div>

                                    <div class="tekst">
                                        <h4>Naslov</h4>
                                    </div>
                                    <div class="read-share-cat">
                                        <a href="single-news.php?id=<?php echo $postCat['id']; ?>" class="btn btn-sm btn-outline-dark read-more">Procitaj više</a>
                                    </div>
                                </div>


                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="row mx-0 my-5">

                    <div class="col-sm-12">
                        <nav>
                            <ul class="pagination flex-wrap" style="width:fit-content; margin-left:auto; margin-right:auto; 
                                     box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php $category->readCategoryPostNum();  ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php $category->noPosts();  ?>

                


            </div>
            <!-- END BIG NEWS -->

            <div class="col-lg-4 m-2 pt-2 smaller">
                <h4>NEDAVNE VIJESTI</h4>
                <hr>
                <?php require 'views/latest-posts.php'; ?>

                <h4>POPULARNI TAGOVI</h4>
                <hr>

                <?php require 'views/popular-forma.php'; ?>
            </div>
        </div> <!-- ==================================== SIDE END  ================================= -->
    </div>



</div>
<!-- FOOOOOOOOOOOOOOOOOOOOOOOOOTER ============================================== -->

<?php include('views/html-includes/footer.php'); ?>