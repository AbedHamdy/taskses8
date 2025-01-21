<?php 

    session_start();
    require_once("./helper/helper.php");
    putData("./storage/cart.json" , []);
    session_destroy();
    redirect("./index.php");



?>