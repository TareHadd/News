<?php


class SinglePost extends Database{

    function readSinglePost(){

        $id = $_GET['id'];

        if (!is_numeric($id))
        {
            header('location:index.php');
        }
            
        
        $sql = "SELECT * FROM vijest WHERE id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        if($results){
            return $results;
        }else
        {
            header('location:index.php');
        }
    }
        


    function readSinglePostGallery(){

        $id = $_GET['id'];

        // if (!is_numeric($id))
        // {
        //     echo "eat shit";
        //     header('location:index.php?status=kaznjivo');
        // }
        // else
        // {
            
        
        $sql = "SELECT * FROM slike_prilog WHERE vijest_id = :id";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;}
    

}