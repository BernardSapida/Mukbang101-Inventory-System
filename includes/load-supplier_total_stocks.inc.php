<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "supplier_product");

    echo count($result);
?>