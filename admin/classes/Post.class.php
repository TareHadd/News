<?php


class Post extends Database
{
    public  function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function addPost()
    {
        
        if (isset($_POST['new_post'])) 
        {
            $naslov = $_POST['naslov'];
            $kategorija =$_POST['kategorija'];
            $kratak_opis = $_POST['kr_opis'];
            $opis = $_POST['opis'];
            $slika = $_FILES['slika'];
            $slike_prilog = $_FILES['dodatne_slike'];
            $autor = $_POST['autor'];
            $datum = $_POST['datum'];
            $tags = $_POST['tags'];
            $status = $_POST['status'];
            $custom = $this->generateRandomString(5);


            if (empty($naslov) && empty($opis) && empty($autor) && empty($datum))
            {
                header('location: ../pages/post.php?error=empty');
                exit();
            }

            if (!is_dir('./../includes/slike')) {
                mkdir('./../includes/slike');
            }

            if ($slika) {
                $imagePath = './../includes/slike/' . $this->generateRandomString(5) . '/' . $slika['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($slika['tmp_name'], $imagePath);
            }


            $sql = "INSERT INTO vijest(naslov,kategorija,kratak_opis,opis,slika,autor,datum,tags,status)
            VALUES ('$naslov','$kategorija','$kratak_opis','$opis','$imagePath','$autor','$datum','$tags','$status' ) ";

            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            header('location: ../pages/active-posts.php');

            $sql2 = "SELECT id FROM vijest ORDER BY id DESC LIMIT 1";
            $statement2 = $this->connect()->prepare($sql2);
            $statement2->execute();
            $row = $statement2->fetch();
            $apId = $row['id'];

            if (!is_dir('prilog')) {
                mkdir('prilog');
              }

              if ($slike_prilog) {
                foreach ($_FILES['dodatne_slike']['tmp_name'] as $i => $image) {
            
                  $imageName = $_FILES['dodatne_slike']['name'][$i];
                  $imageTmpName = $_FILES['dodatne_slike']['tmp_name'][$i];
                  $dir = 'prilog/' . $custom . '/' . $imageName;
                  @mkdir(dirname($dir));
            
                  $result = move_uploaded_file($imageTmpName, $dir);
                  $sql = "INSERT INTO  slike_prilog(prilog,vijest_id) VALUES('$dir','$apId')";
                $statement = $this->connect()->prepare($sql);
                $statement->execute();
                }
              }

            

        }
    }


    function readPost()
    {

        $sql = "SELECT * FROM vijest";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;

        
    }

    function readPostWithPagination(){
        
        $search = $_GET["search"] ?? '';

        $numberPerPage = 10;
        $page = isset($_GET['start']) ? (int)$_GET['start'] : 0;
        if (isset($_GET['start']) && !is_numeric($_GET['start'])) {
            header('location: index.php');  
        }
        $start = $page * $numberPerPage;

        if($search)
        {
            $sql = "SELECT * FROM vijest WHERE naslov LIKE :naslov OR kratak_opis LIKE :naslov ";
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue(':naslov', "%$search%");
        } 
        else {

            $sql = "SELECT * FROM vijest  LIMIT  $start,$numberPerPage";
            $statement = $this->connect()->prepare($sql);
        }
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;

        
    }

    function readPostNum(){



        $numberPerPage = 10;
        // $page = isset($_GET['start']) ? (int)$_GET['start'] : 0;
        // $start = $page * $numberPerPage;


        $sql = "SELECT * FROM vijest";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->rowCount();
        $numLink = ceil($results/$numberPerPage);


        
        // $sql = "SELECT kategorija FROM vijest  LIMIT $start,$numberPerPage ";
        // $statement = $this->connect()->prepare($sql);
        // $statement->execute();

        for ($i=0 ;$i<$numLink; $i++)
        {
            echo '<li class="page-item"><a  class="page-link"  href="index.php?start='.$i.'">'.$i.'</a></li>';
        }
        
    }

    function readPostDesc(){
        $sql = 'SELECT * FROM vijest ORDER BY id DESC LIMIT 5';
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function readPostTags(){
        $sql = 'SELECT tags FROM vijest';
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function readPostDescSwiper(){
        $sql = 'SELECT * FROM vijest ORDER BY id DESC';
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function editStatus()
    {
        if (isset($_POST['skica'])) {

            $id = $_POST['id'];
            $sql = "UPDATE vijest SET status='skica' WHERE id = $id";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            header('location: ../pages/active-posts.php');} 

            else if (isset($_POST['objavljeno']) ){

                $id = $_POST['id'];
                $sql = "UPDATE vijest SET status='objavljeno' WHERE id = $id";
                $statement = $this->connect()->prepare($sql);
                $statement->execute();
                header('location: ../pages/active-posts.php');
        }
    }

    public function editStatusActive()
    {
        if (isset($_POST['submit'])) {

            $id = $_POST['id'];
            $sql = "UPDATE vijest SET status='objavljeno' WHERE id = $id";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            header('location: ../pages/active-posts.php');
        } 
    }

    function updatePostFetch(){

        $id = $_GET['id'];

        $sql = "SELECT * FROM vijest WHERE id = $id";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }


    function updatePost()
    {

        if (isset($_POST['update_post'])) {
            $id = $_GET['id'];

            $id = $_GET['id'];
            $naslov = $_POST['naslov'];
            $kategorija = $_POST['kategorija'];
            $kratak_opis = $_POST['kr_opis'];
            $opis = $_POST['opis'];
            $slika = $_FILES['slika'];
            $slike_prilog = $_FILES['dodatne_slike'];
            $autor = $_POST['autor'];
            $datum = $_POST['datum'];
            $tags = $_POST['tags'];
            $status = $_POST['status'];

            if (!is_dir('slike')) {
                mkdir('slike');
            }

            if ($slika) {
                $imagePath = 'slike/' . $this->generateRandomString(7) . '/' . $slika['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($slika['tmp_name'], $imagePath);
            }


            if (empty($naslov) && empty($$opis) && empty($autor) && empty($datum)) {
                header('location: ../pages/post.php?error=empty');
            } else 
            {


                $sql = "UPDATE vijest SET 
                 naslov='$naslov',
                    kategorija='$kategorija',
                     kratak_opis='$kratak_opis',
                         opis='$opis',
                            slika='$imagePath',
                                autor='$autor',
                                     datum='$datum',
                                         tags='$tags',
                status='$status' WHERE id = $id";
                $statement = $this->connect()->prepare($sql);
                $statement->execute();
                
            }

            $sql2 = "DELETE FROM slike_prilog WHERE vijest_id = $id";
            $statement2 = $this->connect()->prepare($sql2);
            $statement2->execute();
            header('location: ../pages/active-posts.php');

            if($slike_prilog){

                if (!is_dir('prilog')) {
                    mkdir('prilog');
                  }
    
                  if ($slike_prilog) {
                    foreach ($_FILES['dodatne_slike']['tmp_name'] as $i => $image) {
                
                      $imageName = $_FILES['dodatne_slike']['name'][$i];
                      $imageTmpName = $_FILES['dodatne_slike']['tmp_name'][$i];
                      $dir = 'prilog/' .  $this->generateRandomString(5) . '/' . $imageName;
                      @mkdir(dirname($dir));
                
                      $result = move_uploaded_file($imageTmpName, $dir);
                      $sql3 = "INSERT INTO  slike_prilog(prilog,vijest_id) VALUES('$dir','$id')";
                    $statement3 = $this->connect()->prepare($sql3);
                    $statement3->execute();
                    }
                  }

            }






            



            
            
        }
    } 


   




}

