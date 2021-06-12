<?php

require '../autoload/autoloader.php';
$new_post = new Post();
$delete = new Delete();
$string = 'vijest';

?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main class="container-fluid">
    <div id="main" class="content d-flex justify-content-center  ml-my">
        <div style="margin-top:100px;" class="tabela table-responsive">
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naslov</th>
                        <th scope="col">Kategorija</th>

                        <th scope="col">Slika</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($new_post->readPost() as $i => $post) : ?>
                        <tr>
                            <th scope="row"><?php echo $i + 1 ?></th>
                            <td><?php echo $post['naslov']; ?></td>
                            <td><?php echo $post['kategorija']; ?></td>

                            <td><img style="max-width: 50px; max-height: 50px;" src="<?php echo $post['slika']; ?>" alt=""></td>
                            <td><?php echo $post['autor']; ?></td>
                            <td><?php echo $post['datum']; ?></td>
                            <td><?php echo $post['tags']; ?></td>
                            <td>
                                <p class=" <?php if ($post['status'] == "skica") {
                                                echo "bg-danger";
                                            } else {
                                                echo "bg-success";
                                            } ?> d-flex justify-content-center p-1">
                                    <?php echo $post['status']; ?>
                                </p>
                            </td>

                            <td></td>

                            <td>
                                <form action="<?php $new_post->editStatus(); ?>" method="post" style="display: inline-block;">

                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button class="btn btn-sm btn-warning" type="submit" name="skica">Skica</button>

                                </form>
                            </td>

                            <td>
                                <form action="<?php $new_post->editStatus(); ?>" method="post" style="display: inline-block;">

                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button class="btn btn-sm btn-secondary" type="submit" name="objavljeno">Objavi</button>

                                </form>
                            </td>

                            <td>
                                <a href="edit-post.php?id=<?php echo $post['id']; ?>" class="btn btn-sm btn-primary">Uredi</a>
                            </td>

                            <td>
                                <form action="<?php $delete->deletePost(); ?>" method="post" style="display: inline-block;">

                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button class="btn btn-sm btn-danger" type="submit" name="obrisi">Obrisi</button>

                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>



<?php include('../includes/html/footer.php') ?>