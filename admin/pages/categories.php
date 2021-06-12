<?php

require '../autoload/autoloader.php';

$categories = new Category();


?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main style="color:white" class="container">
    <div id="main" class="content d-flex justify-content-center  ml-my">
        <div class="forma width-100">

            <div class="row width-100 d-flex justify-content-center align-items-center"
            style="margin-top: 100px;">
                <div class="col-lg-6 d-flex justify-content-center align-items-center my-3">

                    <form style="width: 80%;" method="post" action="<?php $categories->insertCategory(); ?>">
                        <div class="mb-3">
                            <h4 style="color:black;">Dodaj kategoriju</h4>
                            <input type="text" name="category" class="form-control">
                        </div>
                        <button type="submit" name="dodaj" class="btn btn-dark">Dodaj</button>
                    </form>

                </div>

                <div class="col-lg-6 flex-column my-3">
                    <h4 class="mb-2" style="color:black;">Aktivne kategorije</h4>
                    <table class="table table-dark"
                    style="  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    border-radius:4px;">

                        <thead>
                            <tr>
                                <th scope="col">Indeks</th>
                                <th scope="col">Kategorija</th>
                                <th>Izmjeni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories->getCategories() as $category) : ?>
                                <tr>
                                    <th scope="row"><?php echo $category['id']; ?></th>
                                    <td><?php echo $category['ime']; ?></td>
                                    <td>

                                        <form action="<?php $categories->deleteCategory(); ?>" method="post" style="display: inline-block;">

                                            <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                            <button class="btn btn-sm btn-danger" type="submit" name="obrisi">Obrisi</button>

                                        </form>

                                        <a href="edit-category.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-outline-primary">Uredi</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>

            </div>

        </div>
    </div>
</main>





<?php include('../includes/html/footer.php') ?>