<?php
    require_once "database.inc.php";

    $db = new Database();

    $db -> connect("update", "supplier_customer", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["orderStatus"],
    ));

    $db -> connect("update", "admin_orders", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["orderStatus"],
    ));
?>