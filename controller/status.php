<?php 

    session_start();
    require_once("../helper/helper.php");

    $errors = [];
    if(checkRequestMethod("POST"))
    {
        $id = sanitizeInput($_POST["id"]);
        
        $users = getData("../storage/users.json");
        $data = [];
        $admin = [];
        $number = 0;
        $check = 0;
        foreach($users as $user)
        {
            $number++;
            if($id == $user->id)
            {
                $admin[] = $user;
            }
            else 
            {
                $check++;
                $data[] = $user;
            }
        }
        
        if($check == $number)
        {
            $errors[] = "Don't play with the id";
            $_SESSION["errors"] = $errors;
            redirect("../viewUsers.php");
        }
        else 
        {
            putData("../storage/users.json", $data);
            $admins = getData("../storage/admin.json");
            $admins[] = $admin;
            putData("../storage/admin.json", $admins);
            $success = [];
            $success[] = "Status Changed Successfully";
            $_SESSION["success"] = $success;
            redirect("../viewUsers.php");
        }
    }
    else 
    {
        $errors[] = "Don't play with the request";
        $_SESSION["errors"] = $errors;
        redirect("../viewUsers.php");
    }



?>