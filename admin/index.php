<?php
//
require 'classes/Database.class.php';
require 'classes/Login.class.php';
$logout = new Login();
// $messages = new Message();
session_start();
if (!isset($_SESSION['username']))
    header('location: ../admin/login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./../includes/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['name']; ?></a>

            <div class="collapse navbar-collapse">
                <div class="toggle" onClick="myFunction()"></div>
            </div>
        </div>

        <div class="ml-auto d-flex justify-content-end" style="width: 300px;" >
            <a class="logout mx-2" href="logout.funct.php">Odjavi se</a>
        </div>
    </nav>

    <div id="myDIV" class="navigation active bg-dark">
        <ul>
            <li><a href="#">Status</a></li>
            <li><a href="pages/categories.php">Kategorije</a></li>
            <li><a href="pages/post.php">Objavi</a></li>
            <li><a href="pages/active-posts.php">Aktivne vijesti</a></li>
            <li><a href="pages/messages.page.php">Pristigle poruke</a></li>
            <li><a href="pages/signup.page.php">Registriraj admina</a></li>
        </ul>
    </div>

    <main class="container mt-5">
        <div id="main" class="content main-page d-flex justify-content-center ml-my">

            <div class="row w-100 main-page-row mt-5 d-flex justify-content-evenly">
                <a href="pages/messages.page.php" class="col-md-3 main-page-col bg-primary d-flex flex-column justify-content-center p-5 my-2">

                    <div>
                        <p>Novih poruka:</p>
                    </div>
                    <div>
                        <h4>54</h4>
                    </div>

                </a>
                <div class="col-md-3 my-2 bg-secondary main-page-col  d-flex flex-column justify-content-center p-5">

                    <div>
                        <p>Ukupan broj objava</p>
                    </div>
                    <div>
                        <h4>56</h4>
                    </div>

                </div>
                <div class="col-md-3 my-2 bg-warning main-page-col  d-flex flex-column justify-content-center p-5">
                <div>
                    <p><a href="../../Blog">Stranica</a></p>
                </div>
                </div>
            </div>

        </div>
    </main>




    <script type="text/javascript" src="includes/JS/myJS.js"></script>

    <script src="./../includes/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>