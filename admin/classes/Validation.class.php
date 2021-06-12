<?php 

class Validation
{

    function PostValidation()
    {
        if (isset($_GET["error"]))
        {

            if($_GET["error"] == "empty")
            {
                echo "is-invalid";
            }
        }
    
    }


    function LoginValidation()
    {
        
        if (isset($_GET["error"]))
        {

            if($_GET["error"] == "empty")
            {
                echo "is-invalid";
            }else
            if($_GET["error"] == "incorrect")
            {
                echo "is-invalid";
            }
            else
            {
                echo "is-invalid";
            }
        
        }
    }

    function RegisterValidation()
    {
        
        if (isset($_GET["error"]))
        {

            if($_GET["error"] == "fill")
            {
                echo "is-invalid";
             }
            else

            if($_GET["error"] == "pass")
            {
                echo "is-invalid";
            }else

            if($_GET["error"] == "usernamexist")
            {
                echo "is-invalid";
            }
            else
            {
                echo "is-invalid";
            }
        
        }
    }

}