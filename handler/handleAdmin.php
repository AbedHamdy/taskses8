<?php 

    session_start();
    require_once("../helper/helper.php");
    
    $data = $_SESSION["data"];
    $errors = [];

    if(empty($errors))
    {
        $users = getData("../storage/admin.json");
        $checkOut = 0;
        foreach($users as $user)
        {
            if($user->email == $data["email"] && $user->password == $data["password"])
            {
                $checkOut++;
                $_SESSION["admin"] = [$user->fname , $user->lname , $user->email];
                redirect("../admin.php");
            }
        }
        if($checkOut == 0)
        {
            $errors[] = "Please enter the correct admin password and email";
            $_SESSION["errors"] = $errors;
            redirect("../login.php");
        }
    }
    else 
    {
        $_SESSION["errors"] = $errors;
        redirect("../login.php");
    }

    



























?>