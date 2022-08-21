<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "admin_product");

    echo count($result);
?>