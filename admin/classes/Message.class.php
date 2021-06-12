<?php


class Message extends Database
{

    public function message()
    {
        if (isset($_POST['message'])) {


            $ime = $_POST['name'];
            $email = $_POST['email'];
            $poruka = $_POST['poruka'];

            if (empty($ime) && empty($email) && empty($poruka)) {
                header('location:index.php?status=empty');
            } 
            else {
                $sql = "INSERT INTO  message(ime,email,poruka) VALUES(:ime,:email, :poruka)";
                $statement = $this->connect()->prepare($sql);
                $statement->bindValue(':ime', $ime);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':poruka', $poruka);
                $statement->execute();
                header('location: index.php?status=succcess');
            }
        }
    }

    function readMessages()
    {


        $sql = "SELECT * FROM message ORDER BY id DESC";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    function countMessages()
    {


        $sql = "SELECT * FROM message";
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll;
        $count = $results->rowCount();
        return $count;
    }


    public function deletePost()
    {
        if (isset($_POST['obrisi'])) {
            $id = $_POST['id'];

            $sql = ' DELETE FROM message WHERE id = :id';
            $statement = $this->connect()->prepare($sql);
            $statement->bindValue('id', $id);
            $statement->execute();
            header('location: ../pages/messages.page.php');
        }
    }

}