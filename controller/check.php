<?php 

    session_start();
    require_once("../helper/helper.php");
    $details = getData("../storage/cart.json");
    if(empty($details))
    {
        $_SESSION["error"] = "The cart is empty";
        redirect("../cart.php");
        exit;
    }

    // var_dump($_POST["quantity"]);
    if(isset($_SESSION["user"]))
    {
        $products = getData("../storage/cart.json");
        $errors = [];
    
        if(checkRequestMethod("POST"))
        {
            foreach($_POST["quantity"] as $key => $value)
            {
                $val = sanitizeInput($value);
                if(checkVal($val))
                {
                    foreach($products as $product)
                    {
                        if($product->id == $key)
                        {
                            $product->quantity = $val;
                        }
                    }
                }
                else 
                {
                    $errors["error"] = "Quantity must be a number";
                }
            }
            putData("../storage/cart.json" , $products);
            redirect("../checkout.php");
        }
        else 
        {
            redirect("../cart.php");
        }
    
    
    
        $products = getData("../storage/cart.json");
        foreach($products as $product)
        {
            foreach($_POST["quantity"] as $key => $value)
            {
                if($product->id == $key)
                {
                    $product->quantity = $value;
                }
            }
        }
        putData("../storage/cart.json" , $products);
    }
    else 
    {
        redirect("../login.php");
    }
        





 ?>