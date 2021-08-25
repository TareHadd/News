<nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION['name']; ?></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="toggle" onClick="myFunction()"></div>
            </div>

            <div class="ml-auto d-flex justify-content-end" style="width: 300px;" >
            <a class="logout mx-2" href="../../../../news/admin/logout.funct.php">Odjavi se</a>
            </div>
        </div>
    </nav>

    <div id="myDIV" class="navigation  active bg-dark">
        <ul>
            <li><a href="../index.php">Početna</a></li>
            <li><a href="../../../../news/admin/pages/categories.php">Kategorije</a></li>
            <li><a href="../../../../news/admin/pages/post.php">Objavi</a></li>
            <li><a href="../../../../news/admin/pages/active-posts.php">Aktivne vijesti</a></li>
            <li><a href="../../../../news/admin/pages/messages.page.php">Pristigle poruke</a></li>
            <li><a href="../../../../news/admin/pages/signup.page.php">Registriraj admina</a></li>
        </ul>
    </div>

   