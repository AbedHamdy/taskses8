<?php 
    
    require_once("../helper/helper.php");

    // delete from cart
    $id = sanitizeInput($_GET["id"]);
    $newProduct = [];
    $products = getData("../storage/cart.json");
    
    foreach($products as $key => $product)
    {
        if($product->id == $id)
        {
            unset($products[$key]);
        }
    }
    
    $newProduct = array_values($products);

    putData("../storage/cart.json" , $newProduct);

    redirect("../cart.php");
    






























 ?>