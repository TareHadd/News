<?php

require '../autoload/autoloader.php';
$category = new Category();
$fetch_post = new Post();
$post = $fetch_post->updatePostFetch();



?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main class="container">
    <div id="main" class="content d-flex justify-content-center  ml-my">
        <div class="forma width-100">

            <div class="row width-100 g-3 mt-5 d-flex justify-content-center align-items-center">
                <div class="col-lg-8 d-flex justify-content-center align-items-center my-3">

                

                    <form style="width: 80%;" method="post" action="<?php $fetch_post->updatePost(); ?>" enctype="multipart/form-data">

                    <a href="active-posts.php" class="btn btn-outline-secondary my-2">Nazad</a>
                        <div class="mb-3">
                            <h4>Naslov</h4>
                            <input type="text" name="naslov" class="form-control" value="<?php echo $post['naslov']; ?>">
                        </div>

                        <div class="mb-3">
                            <h4>Kategorija</h4>
                            <select class="form-select" name="kategorija" required>
                                <?php foreach ($category->getCategories() as $cat) : ?>
                                    <option value="<?php echo $cat['ime']; ?>"><?php echo $cat['ime']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="mb-3">
                            <h4>Kratak opis (Max. 2 rečenice)</h4>
                            <textarea name="kr_opis" class="form-control" rows="3"><?php echo $post['kratak_opis']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <h4>Opis</h4>
                            <textarea name="opis" class="form-control" rows="3"><?php echo $post['opis']; ?></textarea>
                        </div>

                        <div class="mb-3">
                            <h4>Slika</h4>
                            <img style="max-width: 50px; margin-bottom:5px;" src="<?php echo $post['slika']; ?>" alt="">
                            <p class="bg-warning" style="text-align: center;">
                            <strong>Važno! Ako želite ažurirati post morate ponovo učitati slike</strong>
                            </p>
                            <input type="file" name="slika" class="form-control">
                        </div>

                        <div class="mb-3">
                            <h4>Dodatne slike u postu</h4>
                            <p class="bg-warning" style="text-align: center;">
                            <strong>Važno! Ako želite ažurirati post morate ponovo učitati slike</strong>
                            </p>
                            <input type="file" name="dodatne_slike[]" multiple class="form-control">
                        </div>

                        <div class="mb-3">
                            <h4>Autor</h4>
                            <input type="text" name="autor" class="form-control" value="<?php echo $post['autor']; ?>">
                        </div>

                        <div class="mb-3">
                            <h4>Datum</h4>
                            <input type="date" name="datum" class="form-control" value="<?php echo $post['datum']; ?>">
                        </div>

                        <div class="mb-3">
                            <h4>Tagovi</h4>
                            <input type="text" name="tags" class="form-control" value="<?php echo $post['tags']; ?>">
                        </div>

                        <div class="mb-3">
                            <h4>Status</h4>
                            <select name="status" class="form-select">
                                <option value="objavljeno">Objavi</option>
                                <option value="skica">Skica</option>
                            </select>
                        </div>
                        <button type="submit" name="update_post" class="btn btn-outline-dark">Azuriraj</button>
                    </form>



                </div>

            </div>

        </div>
    </div>
</main>





<?php include('../includes/html/footer.php') ?>