<?php
    require_once "database.inc.php";

    session_start();

    $db = new Database();
    $supplier = $db -> connect("select", "supplier_product", "product name", $_POST["productName"]);
    
    echo json_encode($supplier);
?>