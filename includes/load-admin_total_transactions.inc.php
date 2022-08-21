<?php
    require_once "database.inc.php";

    $db = new Database();

    $result = $db -> connect("select", "admin_orders", "order status");

    echo count($result);
?>