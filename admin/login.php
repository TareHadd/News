<?php

require 'classes/Database.class.php';
require 'classes/Login.class.php';
require 'classes/Validation.class.php';
$login = new Login();
$validation = new Validation();
session_start();
if (isset($_SESSION['username']))
    header('location: index.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body style="height: 100vh;" class="d-flex justify-content-center align-items-center bg-dark">

    <div class="bg-light p-4 m-4" style="width: 500px;
    border-radius:4px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);">
        <form method="post" action="<?php $login->login(); ?>">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control <?php $validation->LoginValidation(); ?>" name="email">
                <?php if (isset($_GET["error"])) :?>

                    <?php if ($_GET["error"] == "empty") : ?>
                        <div class="invalid-feedback">
                            Unesite email.
                        </div>
                    <?php endif; ?>
                    <?php if ($_GET["error"] == "incorrect") : ?>
                        <div class="invalid-feedback">
                            Netačan email.
                        </div>
                    <?php endif; ?>

                <?php endif; ?>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control <?php $validation->LoginValidation(); ?>" name="pass">

                <?php

                if (isset($_GET["error"])) :

                ?>

                    <?php if ($_GET["error"] == "empty") : ?>
                        <div class="invalid-feedback">
                            Unesite lozinku.
                        </div>
                    <?php endif; ?>

                    <?php if ($_GET["error"] == "incorrectpassword") : ?>
                        <div class="invalid-feedback">
                            Netačna lozinka.
                        </div>
                    <?php endif; ?>

                <?php endif; ?>
            </div>
            <button type="submit" name="login" class="btn btn-primary my-2">Prijavi se</button>
        </form>
    </div>



    <script type="text/javascript" src="includes/JS/myJS.js"></script>
    <script src="./../includes/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>