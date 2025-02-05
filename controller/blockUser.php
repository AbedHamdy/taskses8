<?php 

    session_start();
    require_once("../helper/helper.php");

    $errors = [];
    $success = [];
    if(checkRequestMethod("POST"))
    {
        $id = sanitizeInput($_POST["id"]);
        
        $users = getData("../storage/users.json");

        foreach($users as $user)
        {
            if($id == $user->id)
            {
                $user->status = "blocked";
            }
        }

        putData("../storage/users.json", $users);
        $success[] = "User Blocked Successfully";
        $_SESSION["success"] = $success;
        redirect("../viewUsers.php");



    }
    else 
    {
        $errors[] = "Don't play with the request";
        $_SESSION["errors"] = $errors;
        redirect("../viewUsers.php");
    }











?>