<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $result = $db -> connect("select", "admin_product", "product name", $_POST["productName"]);
    
    echo $result["price"];
?>