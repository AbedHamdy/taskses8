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
        else if(minVal($name , 5))
        {
            $errors[] = "Name must be more than 5 characters";
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

        // validation address
        if(requireVale($address))
        {
            $errors[] = "address is required";
        } 
        else if(maxVal($address , 70))
        {
            $errors[] = "address is too long";
        }

        // validation phone 
        if(requireVale($phone))
        {
            $errors[] = "phone is required";
        }
        else if(maxVal($phone , 14))
        {
            $errors[] = "phone is wrong";
        }
        else if(minVal($phone , 11))
        {
            $errors[] = "phone is wrong";
        }

        // validation notes 
        if(maxVal($note , 70))
        {
            $errors[] = "Notes is too long";
        }

        $data = 
        [
            "name" => $name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "note" => $note
        ];

        if(empty($errors))
        {
            $users = getData("../storage/userOrder.json");
            $products = getData("../storage/cart.json");
            $data[] = $products;
            $users[] = $data;
            putData("../storage/userOrder.json" , $users);
            $_SESSION["done"] = "Successfully";
            redirect("../checkout.php");
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../checkout.php");
        }
    }
    else 
    {
        redirect("../checkout.php");
    }




























 ?>