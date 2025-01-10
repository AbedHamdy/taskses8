<?php 

    session_start();
    require_once("../helper/helper.php");

    $errors = [];

    if(checkRequestMethod("POST"))
        {
            foreach($_POST as $key => $value)
            {
                $$key = sanitizeInput($value);
            }

            // validation email 
            if(requireVale($email))
            {
                $errors[] = "email is required";
            }
            else if(emailVal($email))
            {
                $errors[] = "please type a valid email ";
            }

            // validation password 
            if(requireVale($password))
            {
                $errors[] = "password is required";
            }
            else if(minVal($password , 6))
            {
                $errors[] = "password must be grater than 6 chars ";
            }
            else if(maxVal($password , 25))
            {
                $errors[] = "password must be smaller than 25 chars ";
            }

            $data = 
            [
                "email" => $email,
                "password" => sha1($password)
            ];

            if(empty($errors))
            {
                $users = getData("../storage/users.json");
                $checkOut = 0;
                foreach($users as $user)
                {
                    if($user->email == $data["email"] && $user->password == $data["password"])
                    {
                        $checkOut++;
                        $_SESSION["user"] = [$user->fname , $user->lname , $user->email];
                        redirect("../checkout.php");
                    }
                }
                if($checkOut == 0)
                {
                    $_SESSION["errors"] = "Please enter correct password and email";
                    redirect("../login.php");
                }
            }
            else 
            {
                $_SESSION["errors"] = $errors;
                redirect("../login.php");
            }
        }
        else 
        {
            redirect("../login.php");
        }
 ?>