<?php 
    require_once("../helper/helper.php");
    session_start();
    
    $errors =[];
    // add products in home 
    if(checkRequestMethod("POST"))
    {
        $data = [];
        foreach($_POST as $key => $value)
        {
            $data[$key] = sanitizeInput($value);
        }
        $data["id"] = uniqid();
        $data["quantity"] = 1;

        // image 
        if(isset($_FILES['image']) && $_FILES['image']['error'] == 0)
        {
            $imageTmpPath = $_FILES["image"]["tmp_name"];
            $imageName = $_FILES["image"]["name"];
            $imageType = $_FILES["image"]["type"];
            
            $acceptType = ['image/jpeg', 'image/png', 'image/gif'];
            
            if(in_array($imageType , $acceptType))
            {
                $storagePlace = "../storage/image/" ;

                if(!is_dir(filename: $storagePlace))
                {
                    mkdir($storagePlace , 0777 , true);
                }

                $imagePath = $storagePlace . basename($imageName);

                if(move_uploaded_file($imageTmpPath , $imagePath))
                {
                    $data["image"] = $imageName;
                }
            }
        }
        else 
        {
            $errors[] = "Product image not found";
        }

        // validation product name 
        if(requireVale($data["name"]))
        {
            $errors[] = "Product name is required";
        }
        else if(maxVal($data["name"] ,50))
        {
            $errors[] = "Product name must be less than 50 characters";
        }

        // validation product category 
        if(requireVale($data["category"]))
        {
            $errors[] = "Product category is required";
        }
        else if(maxVal($data["category"] ,50))
        {
            $errors[] = "Product category must be less than 50 characters";
        }

        // validation product price
        if(requireVale($data["price"]))
        {
            $errors[] = "Product price is required";
        }
        elseif(!checkVal($data["price"]))
        {
            $errors[] = "Product price must be a number";
        }

        // validation product sale
        if(requireVale($data["sale"]) && $data["sale"] != 0)
        {
            $errors[] = "Product sale is required";
        }
        elseif(!checkVal($data["sale"]))
        {
            $errors[] = "Product sale must be a number";
        }


        if(empty($errors))
        {
            if($data["category"] == "Cars")
            {
                AddProducts("../storage/cars.json" , $data);
            }
            else if($data["category"] == "Phones")
            {
                AddProducts("../storage/phones.json" , $data);
            }
            AddProducts("../storage/products.json" , $data);
            redirect("../index.php");
        }
        else 
        {
            $_SESSION["errors"] = $errors;
            redirect("../addproducts.php");
        }

    }
    else 
    {
        redirect("../addproducts.php");
    }


    
    























 ?>