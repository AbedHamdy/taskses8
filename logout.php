<?php 

    session_start();
    require_once("./helper/helper.php");
    session_destroy();
    redirect("./index.php");



?>