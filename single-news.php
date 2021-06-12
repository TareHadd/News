<?php include('views/html-includes/header.php'); ?>

<?php

foreach ($singlePost->readSinglePost() as $single);

?>

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
        <div class="row d-flex">
            <div style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); max-width:95%; margin-left:auto;margin-right:auto;" class="col-lg-6 bigger my-5 white">
                <div>
                    <div class=" img">
                        <img style="max-width: 100%; padding-top:12px;" src="./admin/pages/<?php echo $single['slika']; ?>" alt="">
                    </div>

                    <div class="tekst">
                        <h4><?php echo $single['naslov'] ?></h4>
                        <p><?php echo $single['kratak_opis'] ?></p>
                    </div>

                    <div class="vijest">
                        <p><?php echo $single['opis']; ?></p>
                    </div>

                    <div class="datum-autor" style="display: flex;justify-content:space-between; align-items:center;">
                        <p>Datum: <?php echo $single['datum']; ?> </p>
                        <p>Autor: <?php echo $single['autor'];  ?></p>
                    </div>


                    <div style="display: flex; justify-content:space-between;">


                        <p>Kategorija: <?php echo $single['kategorija'] ?></p>
                        <p>ikone</p>

                    </div>
                </div>


                <!-- Button trigger modal -->

                <div class="vidi-nazad d-flex pb-2" style="justify-content:flex-end; ">
                    <a href="index.php" class="btn btn-outline-secondary m-1">Nazad</a>
                    <button type="button" class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Vidi slike
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $single['naslov'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="slike" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <?php foreach ($singlePost->readSinglePostGallery() as $slikePrilog) : ?>
                                        <img style="width: 95%; margin: 20px 0;" src="./admin/pages/<?php echo $slikePrilog['prilog']; ?>" alt="">
                                    <?php endforeach; ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvori</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php //for($i=1;$i<20;$i++): 
                ?>
                <!-- <div class="comments" style="width: 100%; background:violet">
                
                <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium id odit odio quo pariatur dolorum tempore deleniti perferendis, ipsa veniam neque similique, deserunt doloribus accusamus esse cumque officiis eaque maxime.</p>
                </div>

              
                </div> -->
                <?php //endfor; 
                ?>
            </div>


            <!-- END BIG NEWS -->

            <div class="col-lg-4  smaller">
                <h4>LATEST POSTS</h4>
                <hr>
                <?php require 'views/latest-posts.php'; ?>

                <h4>POPULAR THINGS</h4>
                <hr>

                <?php require 'views/popular-forma.php'; ?>
            </div>
        </div> <!-- ==================================== SIDE END  ================================= -->
    </div>

</div>


<!-- FOOOOOOOOOOOOOOOOOOOOOOOOOTER ============================================== -->

<?php include('views/html-includes/footer.php'); ?>