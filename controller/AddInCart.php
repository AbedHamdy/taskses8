<?php 

    require_once("../helper/helper.php");

    // add to cart 
    if(isset($_POST["id"]))
    {
        $id = sanitizeInput($_POST["id"]);
        $detailsProduct = [];
        $products =getData("../storage/products.json");
        foreach($products as $product)
        {
            if($product->id == $id)
            {
                $detailsProduct["id"] = $product->id;
                $detailsProduct["name"] = $product->name;
                if($product->sale > 0)
                {
                    $detailsProduct["price"] = $product->sale;
                }
                else 
                {
                    $detailsProduct["price"] = $product->price;
                }
            }
        }
        $productOfCart = getData("../storage/cart.json");
        $productOfCart[] = $detailsProduct;
        putData("../storage/cart.json" , $productOfCart);
        redirect("../cart.php");
    }
    else 
    {
        redirect("../index.php");
    }










 ?>