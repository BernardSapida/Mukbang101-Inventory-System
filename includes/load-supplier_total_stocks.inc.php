<?php
    require_once "database.inc.php";
    
    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_product", array("supplierName" => $_SESSION["store name"]));

    echo count($result);
?>