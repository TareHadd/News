
<?php include('views/html-includes/header.php'); ?>


<!-- ==================================== SIDE NAV ================================= -->
<div class="side-nav" id="side-nav">

    <div class="inside">
        <ul class="categories-side">

            <?php foreach ($category->getCategories() as  $cat) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="category.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['ime']; ?></a>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>
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
    <div class="news-side container ">
        <div class="row d-flex" style="justify-content: space-evenly;">
            <div class="col-lg-6 bigger">

                <div class="row">
                    <div class="col-lg-12 gray">
                        <?php foreach ($posts->readPostWithPagination() as  $post) : ?>
                            <?php if ($post['status'] === 'objavljeno') : ?>
                                <div style="margin-left: auto; margin-right:auto;" class="news my-5 white">
                                    <div class="pt-1 img"> <img src="./admin/pages/<?php echo $post['slika'] ?>" alt=""></div>

                                    <div class="tekst">
                                        <h4><?php echo $post['naslov'] ?></h4>
                                        <p><?php echo $post['kratak_opis'] ?></p>
                                    </div>
                                    <div class="read-share">
                                        <a href="single-news.php?id=<?php echo $post['id'] ?>" class="btn btn-sm btn-outline-dark read-more">Procitaj više</a>
                                        <div>
                                            <p>ikone</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

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
                                        <?php $posts->readPostNum();  ?>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <!-- END BIG NEWS -->

            <div class="col-lg-4 sm-0  smaller">
                <h4>LATEST POSTS</h4>
                <hr>

                <?php require 'views/latest-posts.php'; ?>

                <h4>POPULAR THINGS</h4>
                <hr>

                <?php require 'views/popular-forma.php'; ?>
            </div>

        </div> <!-- ==================================== SIDE END  ================================= -->
        <!-- 
        <div class="row">
            <?php //$posts->readPostNum(); 
            ?>
        </div> -->
    </div>


</div>

<!-- FOOOOOOOOOOOOOOOOOOOOOOOOOTER ============================================== -->
<?php include('views/html-includes/footer.php'); ?>