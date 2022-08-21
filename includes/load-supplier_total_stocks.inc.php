<?php
    require_once "database.inc.php";
    
    session_start();

    $db = new Database();

    $result = $db -> connect("select", "supplier_product", array("supplierUID" => $_SESSION["uid"]));

    echo count($result);
?>