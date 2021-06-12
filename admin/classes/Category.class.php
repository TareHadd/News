<?php


class Category extends Database
{
    public function getCategories()
    {
        $sql = 'SELECT * FROM category';
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function deleteCategory(){
        if (isset($_POST['obrisi'])) {
            $id = $_POST['id'];

            $sql = ' DELETE FROM category WHERE id = :id';
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue('id', $id);
            $statement->execute();
            header('location: ../pages/categories.php');
        }
    }

    public function insertCategory()
    {
        if (isset($_POST['dodaj'])) {


            $ime = $_POST['category'];
            $sql = "INSERT INTO  category(ime) VALUES('$ime')";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            header('location: ../pages/categories.php');
        }
    }

    public function editCategory()
    {
        if (isset($_POST['izmjeni'])) {

            $id = $_GET['id'];
            $ime = $_POST['category'];
            $sql = "UPDATE category SET ime='$ime' WHERE id = $id";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            
            header('location: ../pages/categories.php');
        } 
    }


    function getCategoryName($id)
    {
        $sql = "SELECT ime FROM category WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $results = $statement->fetch(PDO::FETCH_ASSOC);
        return $results;
    }



    function getPostCategory(){

        $numberPerPage = 10;
        $page = isset($_GET['start']) ? (int)$_GET['start'] : 0;
        $start = $page * $numberPerPage;

        $id = $_GET['id'];
        if (!is_numeric($id))
        {
            header('location:index.php');
        }else

       { $kategorija = $this->getCategoryName($id);
        $ime = $kategorija['ime'];

        $sql = "SELECT * FROM vijest WHERE kategorija = '$ime' LIMIT  $start,$numberPerPage";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        ob_end_clean();
    }
    }

    function readCategoryPostNum(){

        $id = $_GET['id'];


        $numberPerPage = 10;
        // $start = $page * $numberPerPage

        
        $sql = "SELECT ime FROM category WHERE id = :id ";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $resultCat = $statement->fetch(PDO::FETCH_ASSOC);
        if(!$resultCat)
        {
             header('location:index.php');
        } else {
            $categoryName = $resultCat['ime'];
        }


        $sql = "SELECT * FROM vijest WHERE kategorija = '$categoryName'";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->rowCount();
        $numLink = ceil($results/$numberPerPage);


        if (!is_numeric($id))
        {
            header('location: index.php');
        }

        if (isset($_GET['start'])) {
            $start = $_GET['start'];
            if (!is_numeric($start)) {
                header('location: index.php');
            }
        }

        

        for ($i=0 ;$i<$numLink; $i++)
        {
            echo '<li class="page-item"><a  class="page-link"  href="category.php?id='.$id.'&start='.$i.'">'.$i.'</a></li>';
        }
        


    }

    function noPosts(){

        $id = $_GET['id'];

        $sql = "SELECT ime FROM category WHERE id = :id ";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $resultCat = $statement->fetch(PDO::FETCH_ASSOC);
        $categoryName = $resultCat['ime'];

        $sql = "SELECT * FROM vijest WHERE kategorija = '$categoryName'";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->rowCount();

        if ($results == 0)
        {
            echo '
                <h1>Kategorija: '.$categoryName.'</h1>
                <h4 class="bg-danger p-1" style="text-align: center;">Nažalost u ovoj kategoriji nema objava</h4>
                <a href="index.php" class="btn btn-dark">Nazad</a>';
        }
    }

}