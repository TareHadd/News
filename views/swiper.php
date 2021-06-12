<div  class="swipers ">

    <div class="swiper-container">

        <div class="swiper-wrapper">
            <?php foreach ($posts->readPostDescSwiper() as  $post_swiper) : ?>
                <?php if($post_swiper['status']==='objavljeno'): ?>
                <div class="swiper-slide">

                    <a href="single-news.php?id=<?php echo $post_swiper['id']; ?>" style="width: 100%;height: 100%;text-decoration: none;">
                        <div class="row left">
                            <img src="./admin/pages/<?php echo $post_swiper['slika']; ?>" alt="">

                            <div class="content col p-0">

                                <div class="p-4">
                                    <p class="category"><?php echo $post_swiper['kategorija']; ?></p>
                                    <h4 class="heading-4"><?php echo $post_swiper['naslov']; ?></h4>
                                    <p class="content-p">
                                        Više u nastavku
                                    </p>
                                    <p class="category date"><?php echo $post_swiper['datum']; ?>.</p>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <?php endif; ?>
            <?php endforeach; ?>


            <div class="swiper-slide">

                <div class="row left">
                    <img src="images/s.png" class="centered" alt="">

                    <div class="content col p-0">

                        <div class="p-4">
                            <p class="category">KATERGORIJA</p>
                            <h4 class="heading-4">Naslov</h4>
                            <p class="content-p">
                                Više u nastavku
                            </p>
                            <p class="category date">12/12/2021.</p>
                        </div>
                    </div>
                </div>

            </div>




        </div>

        <div class="swiper-pagination"></div>


        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>


        <div class="swiper-scrollbar"></div>
    </div>
</div> 