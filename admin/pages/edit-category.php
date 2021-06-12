<?php

require '../autoload/autoloader.php';

$categories = new Category();


?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main class="container">
    <div id="main" class="content d-flex justify-content-center  ml-my">
        <div class="forma width-100">

            <div class="row width-100 g-3 mt-5 d-flex justify-content-center align-items-center">
                <div class="col-lg-6 d-flex justify-content-center align-items-center my-3">
                    <form style="width: 80%;" method="post" method="<?php $categories->editCategory(); ?>" >
                        <div class="mb-3">
                            <h4>Izmjeni kategoriju</h4>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <button type="izmjeni" name="izmjeni" class="btn btn-outline-dark">Izmjeni</button>
                    </form>

                </div>

            </div>

        </div>
    </div>
</main>





<?php include('../includes/html/footer.php') ?>