<?php

require '../autoload/autoloader.php';

$messages = new Message();
$messagesList = $messages->readMessages();


?>

<?php include('../includes/html/header.php') ?>

<?php include('../includes/html/rest.php') ?>



<main style="color:white" class="container">
    <div id="main" class="content d-flex justify-content-center  ml-my" style="margin-top: 100px;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ime</th>
                    <th scope="col">Email</th>
                    <th scope="col">Poruka</th>
                    <th scope="col">Akcija</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($messagesList as $i => $message) : ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $message['ime']; ?></td>
                    <td><?php echo $message['email']; ?></td>
                    <td><?php echo $message['poruka']; ?></td>
                    <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Uredi</a>

                                <form action="<?php $messages->deletePost(); ?>" method="post" style="display: inline-block;">

                                    <input type="hidden" name="id" value="<?php echo $message['id']; ?>">
                                    <button class="btn btn-sm btn-danger" type="submit" name="obrisi">Obrisi</button>

                                </form>

                        
                            </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</main>





<?php include('../includes/html/footer.php') ?>