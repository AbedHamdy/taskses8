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

        // validation name 
        if(requireVale($name))
        {
            $errors[] = "Name is required";
        }
        else if(maxVal($name , 30))
        {
            $errors[] = "Name must be less than 30 characters";
        }
        else if(minVal($name , 6))
        {
            $errors[] = "Name must be more than 6 characters";
        }

        // validation email
        if(requireVale($email))
        {
            $errors[] = "email is required";
        }
        else if(emailVal($email))
        {
            $errors[] = "please type a valid email";
        }

        // validation message 
        if(maxVal($message , 255))
        {
            $errors[] = "message is too long";
        }

        $data = 
        [
            "name" => $name,
            "email" => $email,
            "message" => $message
        ];

        if(empty($errors))
        {
            $users = getData("../storage/contact.json");
            $check = 0;
            foreach($users as $user)
            {
                if($user->email == $data["email"])
                {
                    $check = 1;
                    $user->message .= " , " . $data["message"];
                }
            }
            if($check > 0)
            {
                putData("../storage/contact.json" , $users);
                redirect("../contact.php");
            }
            else
            {
                $users[] = $data;
                putData("../storage/contact.json" , $users);
                redirect("../contact.php");
            }
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../contact.php");
        }
    }
    else 
    {
        redirect("../contact.php");
    }
























 ?>