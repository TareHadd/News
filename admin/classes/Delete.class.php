<?php

class Delete extends Database
{
    public function deletePost(){
        if (isset($_POST['obrisi'])) {
            $id = $_POST['id'];

            $sql = ' DELETE FROM vijest WHERE id = :id';
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue('id', $id);
            $statement->execute();
            ob_start();
            header('location: ../pages/active-posts.php');
            ob_end_clean();
        }
    }
}