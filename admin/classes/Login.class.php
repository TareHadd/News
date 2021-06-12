<?php


class Login extends Database{


    function login(){

        if (isset($_POST['login'])) 
        {
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $exist = $this->userExist($email);

            if(empty($email) && empty($password))
            {
                header('location: login.php?error=empty');
                exit(); 
            }

            if ($exist === false){
                header('location: login.php?error=incorrect');
                exit();
            }


            $dbpass = $exist['password'];
            $verify = password_verify($password,$dbpass);
            if( $verify )
            {
                session_start();
                $_SESSION['name'] =  $exist['name'];
                $_SESSION['username'] =  $exist['username'];
                header('location: index.php');
                exit();

            }else
            {
                header('location: login.php?error=incorrectpassword ');
                exit();
            }
        }


    }

    function userExist($email){

        $result = '';
        $sql = "SELECT * FROM login WHERE email = :email";
        $statement = $this->connect()->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            return $row;
        }else
        {
            $result = false;
            return $result;
        }
    }


    function register(){

        if (isset($_POST['register'])) 
        {
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $passwordRep = $_POST['passRep'];
            $username = $_POST['username'];
            $name = $_POST['name'];
            $exist = $this->userExist($email);
            $dbUsername = $exist['username'];
            $dbName = $exist['name'];

            if (empty($email) && empty($password) && empty($passwordRep) && empty($username ) )
            {
                header('location: signup.page.php?error=fill');
                exit();
            }

            if( $password  !== $passwordRep )
            {
                header('location: signup.page.php?error=pass');
                exit();
            }

            if ( $username === $dbUsername )
            {
                header('location: signup.page.php?error=usernamexist');
                exit();
            }

            if($exist)
            {
                header('location:signup.page.php?error=userexist');
                exit();
            }

             $hashing = password_hash($password, PASSWORD_DEFAULT);

             $sql = " INSERT INTO login(name,email,username,password) VALUES ('$name','$email','$username','$hashing') ";
             $statement = $this->connect()->prepare($sql);
             $statement->execute();
             header('location: ../login.php');
        }
    }

}