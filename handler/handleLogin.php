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

        // validation role
        if(requireVale($role))
        {
            $errors[] = "Role is required";
        }
        else if($role != "user" && $role != "admin")
        {
            $errors[] = "Role must be user or admin ";
        }

        $data = 
        [
            "email" => $email,
            "password" => sha1($password)
        ];

        if(empty($errors))
        {
            if($role == "user")
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
                    $errors[] = "Please enter the correct user password and email";
                    $_SESSION["errors"] = $errors;
                    redirect("../login.php");
                }
            }
                else if ($role == "admin")
            {
                $_SESSION["data"] = $data;
                redirect("./handleAdmin.php");
            }
            else 
            {
                $errors[] = "User and admin only allowed";
                $_SESSION["errors"] = $errors;
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