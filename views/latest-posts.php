<div  class="post my-5 gray">
                <div class="row m-0 p-0">
                    <div class="col-lg-12 p-0 ">
                        <?php foreach ($posts->readPostDesc() as  $latest_post) : ?>
                            <?php if($latest_post['status']==='objavljeno'): ?>
                            <a class="side-news" href="single-news.php?id=<?php echo $latest_post['id']; ?>">
                                <div class="row my-3 mx-1 post-each g-1 white">
                                    <div class="col-4 d-flex justify-content-center">
                                        <img style="max-width: 100px; max-height:100px;" src="./admin/pages/<?php echo $latest_post['slika'] ?>" alt="">
                                    </div>

                                    <div class="col-sm-8 m-0 p-0 latest-text d-flex justify-content-center align-items-center">
                                        <h4 style="font-size: 18px; text-align:center; "><?php echo $latest_post['naslov'] ?></h4>
                                    </div>
                                </div>
                            </a>
                            <?php endif; ?>
                        <?php endforeach; ?>




                    </div>
                </div>
            </div>