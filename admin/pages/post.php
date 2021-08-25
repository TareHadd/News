<?php

require '../autoload/autoloader.php';
$category = new Category();
$new_post = new Post();
$validation = new Validation();


?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main class="container">
    <div id="main" class="content d-flex justify-content-center  ml-my">
        <div class="forma width-100">

            <div class="row width-100 g-3 mt-5 d-flex justify-content-center align-items-center">
                <div class="col-lg-12 d-flex justify-content-center align-items-center my-3">

                    <form style="width: 80%;" method="post" action="<?php $new_post->addPost(); ?>" enctype="multipart/form-data">

                        <div class="row mt-5 d-flex justify-content-between">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h4>Naslov</h4>
                                    <input type="text" name="naslov" class="form-control <?php $validation->PostValidation(); ?> ">
                                    <div class="invalid-feedback">
                                        Popunite polje.
                                    </div>
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
                                    <textarea name="kr_opis" 
                                    class="form-control  <?php $validation->PostValidation(); ?> " rows="3">
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Popunite polje.
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <h4>Slika</h4>
                                    <input type="file" name="slika" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <h4>Dodatne slike u postu</h4>
                                    <input type="file" name="dodatne_slike[]" multiple class="form-control">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="mb-3">
                                    <h4>Opis</h4>
                                    <textarea name="opis" class="form-control <?php //$validation->PostValidation(); ?> " rows="3" 
                                    ></textarea>
                                    <div class="invalid-feedback">
                                        Popunite polje.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h4>Autor</h4>
                                    <input type="text" name="autor" class="form-control <?php $validation->PostValidation(); ?> ">
                                    <div class="invalid-feedback">
                                        Popunite polje.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h4>Datum</h4>
                                    <input type="date" name="datum" class="form-control <?php $validation->PostValidation(); ?> ">
                                    <div class="invalid-feedback">
                                        Odaberi datum.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h4>Tagovi</h4>
                                    <input type="text" name="tags" class="form-control <?php $validation->PostValidation(); ?> ">
                                    <div class="invalid-feedback">
                                        Popunite polje.
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <h4>Status</h4>
                                    <select name="status" class="form-select">
                                        <option value="objavljeno">Objavi</option>
                                        <option value="skica">Skica</option>
                                    </select>
                                </div>


                            </div>
                        </div>





                        <button type="submit" name="new_post" class="btn btn-lg btn-dark">Objavi</button>








                    </form>



                </div>

            </div>

        </div>
    </div>
</main>



</script>


<?php include('../includes/html/footer.php'); ?>