<?php
    require_once "database.inc.php";

    $db = new Database();

    $db -> connect(
        "update", 
        "supplier_customer", 
        array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatuss" => $_POST["status"],
        ),
    );
?>