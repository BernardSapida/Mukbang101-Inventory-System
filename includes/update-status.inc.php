<?php
    require_once "database.inc.php";

    $db = new Database();

    $db -> connect("update", "supplier_customer", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["status"],
    ));

    $db -> connect("update", "admin_orders", array(
            "transactionNo" => $_POST['transactionNo'],
            "orderStatus" => $_POST["status"],
    ));

    if(strcmp($_POST["status"], "Completed") == 0) {
        $adminOrders = $db -> connect("select", "admin_orders", "transaction no.", $_POST["transactionNo"]);
        $result = $db -> connect("select", "admin_product", "product code", $_POST["productCode"]);

        $db -> connect("update", "admin_product", array(
            "productCode" => $_POST["productCode"],
            "quantity" => $result["quantity"] + ($adminOrders["pcs per box"] * $adminOrders["box quantity"]),
            "price" => $result["price"],
        ));
    } 
    
?>