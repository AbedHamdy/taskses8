<?php 

    session_start();
    require_once("../helper/helper.php");

    $errors =[];

    if(checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value)
        {
            $$key = sanitizeInput($value);
        }

        // validation first name 
        if(requireVale($fname))
        {
            $errors[] = "First name is required";
        }
        else if(minVal($fname , 3))
        {
            $errors[] = "First name must be grater than 3 chars ";
        }
        else if(maxVal($fname , 15))
        {
            $errors[] = "First name must be smaller than 25 chars ";
        
        }
        // validation last name 
        if(requireVale($lname))
        {
            $errors[] = "Last name is required";
        }
        else if(minVal($lname , 3))
        {
            $errors[] = "Last name must be grater than 3 chars ";
        }
        else if(maxVal($lname , 15))
        {
            $errors[] = "Last name must be smaller than 25 chars ";
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
        else if(uniqueVal($email , "../storage/users.json"))
        {
            $errors[] = "email is already taken";
        }

        // validation gender 
        if(requireVale($gender))
        {
            $errors[] = "gender is required";
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
        else if($role != "admin")
        {
            $errors[] = "Role must be Admin ";
        }
        
        
        $data = 
        [
            "id" => uniqid(),
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email,
            "gender" => $gender,
            "password" => sha1($password)
        ];
        
        if(empty($errors))
        {
            if($role == "user")
            {
                $users = getData("../storage/users.json");
                $users[] = $data;
                putData("../storage/users.json", $users);
                redirect("../login.php");
            }
            else if($role == "admin")
            {
                $users = getData("../storage/admin.json");
                $users[] = $data;
                putData("../storage/admin.json", $users);
                redirect("../login.php");
            }
            else 
            {
                $errors[] = "User and admin only allowed";
                $_SESSION["errors"] = $errors;
                redirect("../register.php");
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../register.php");
        }

        
    }
    else 
    {
        redirect("../register.php");
    }

























 ?>