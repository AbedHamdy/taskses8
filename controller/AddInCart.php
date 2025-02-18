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
                $detailsProduct["quantity"] = $product->quantity;
            }
        }
        
        $productOfCart = getData("../storage/cart.json");
        $check = 0;
        foreach($productOfCart as $product)
        {
            if($detailsProduct["id"] == $product->id)
            {
                $check++ ;
                $product->quantity += 1;
                break;
            }
        }

        if($check == 0)
        {
            $productOfCart[] = $detailsProduct;
        }
        putData("../storage/cart.json" , $productOfCart);
        redirect("../cart.php");
    }
    else 
    {
        redirect("../index.php");
    }










 ?>