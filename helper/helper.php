<?php 

    function checkRequestMethod($method)
    {
        if($_SERVER["REQUEST_METHOD"] == $method)
        {
            return true;
        }
    }

    function sanitizeInput($input)
    {
        return trim(htmlspecialchars(htmlentities($input)));
    }

    function requireVale($input)
    {
        if(empty($input))
        {
            return true;
        }
        return false;
    }

    function maxVal($input , $length)
    {
        if(strlen($input) > $length)
        {
            return true;
        }
        return false;
    }
    function minVal($input , $length)
    {
        if(strlen($input) < $length)
        {
            return true;
        }
        return false;
    }

    function checkVal($input)
    {
        if(is_numeric($input))
        {
            return true;
        }
        return false;
    }

    function emailVal($input)
    {
        if(!filter_var($input , FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        return false;
    }

    function uniqueVal($input , $filePath)
    {
        $users = getData($filePath);
        foreach($users as $user)
        {
            if($user->email == $input)
            {
                return true;
            }
        }
        return false;
    }

    function getData($filePath)
    {
        if(!file_exists($filePath))
        {
            return [];
        }
        return json_decode(file_get_contents($filePath));
    }

    function putData($filePath, $data)
    {
        file_put_contents($filePath , json_encode($data) , JSON_PRETTY_PRINT);
    }

    function AddProducts($filePath , $data)
    {
        $products = getData($filePath);
        $products[] = $data;
        putData($filePath , $products);
    }

    function redirect($filePath)
    {
        header("location: $filePath");
    }
























 ?>